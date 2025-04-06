<?php
session_start();
// error_reporting(0);
include 'conn.php';
include '../../timezone.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['member_qrcode'])) {
    $qrcode = trim($_POST['member_qrcode']);

    if (empty($qrcode)) {
        $_SESSION['error'] = "Please scan or enter a valid QR Code.";
        header("Location: ../scanner.php");
        exit();
    }

    // Check if QR code exists in the members table
    $memberQuery = $conn->prepare("SELECT user_id FROM members WHERE qrcode = ?");
    $memberQuery->bind_param("s", $qrcode);
    $memberQuery->execute();
    $memberResult = $memberQuery->get_result();
    
    if ($memberResult->num_rows > 0) {
        $member = $memberResult->fetch_assoc();
        $user_id = $member['user_id'];
        $date_today = date("Y-m-d");
        $time_now = date("H:i:s");

        // Check if the user has already timed in today
        $attendanceQuery = $conn->prepare("SELECT * FROM attendance WHERE user_id = ? AND curr_date = ?");
        $attendanceQuery->bind_param("is", $user_id, $date_today);
        $attendanceQuery->execute();
        $attendanceResult = $attendanceQuery->get_result();

        if ($attendanceResult->num_rows == 0) {
            // No record today -> Time IN
            $insertQuery = $conn->prepare("INSERT INTO attendance (user_id, curr_date, curr_time, present, time_in) VALUES (?, ?, ?, 1, ?)");
            $insertQuery->bind_param("isss", $user_id, $date_today, $time_now, $time_now);

            if ($insertQuery->execute()) {
                $_SESSION['success'] = "Time IN recorded successfully!";
            } else {
                $_SESSION['error'] = "Failed to record Time IN.";
            }
        } else {
            // Record exists -> Time OUT
            $attendance = $attendanceResult->fetch_assoc();
            if ($attendance['time_out'] == '00:00:00' || empty($attendance['time_out'])) {

                $updateQuery = $conn->prepare("UPDATE attendance SET time_out = ? WHERE user_id = ? AND curr_date = ?");
                $updateQuery->bind_param("sis", $time_now, $user_id, $date_today);

                if ($updateQuery->execute()) {
                    $_SESSION['success'] = "Time OUT recorded successfully!";
                } else {
                    $_SESSION['error'] = "Failed to record Time OUT.";
                }
            } else {
                $_SESSION['error'] = "You have already timed out today!";
            }
        }
    } else {
        $_SESSION['error'] = "Invalid QR Code!";
    }

    header("Location: ../scanner.php");
    exit();
}
?>
