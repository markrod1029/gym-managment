<?php
include 'session.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && isset($_POST['status'])) {
    $userId = $_POST['user_id'];
    $newStatus = $_POST['status'];

    $updateQuery = "UPDATE staffs SET status = '$newStatus' WHERE user_id = '$userId'";
    
    if ($conn->query($updateQuery)) {
        $_SESSION['success'] = "Trainer status updated successfully!";
    } else {
        $_SESSION['error'] = "Failed to update status!";
    }
    header("Location: ../status_trainer.php"); // Redirect to main page after update
    exit;
} else {
    $_SESSION['error'] = "Invalid request!";
    header("Location: ../status_trainer.php");
    exit;
}
?>
