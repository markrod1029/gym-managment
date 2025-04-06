<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['task_id']) || empty($_POST['task_id'])) {
        die("<script>alert('No Task ID received!'); window.location.href='../dashboard.php';</script>");
    }

    $task_id = intval($_POST['task_id']); // Security measure


    // Update task status
    $query = "UPDATE `todo` SET task_status = 'Done' WHERE id = '$task_id'";

    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Task marked as completed!'); window.location.href='../home.php';</script>";
    } else {
        echo "<script>alert('Error updating task: " . $conn->error . "'); window.location.href='../home.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='../home.php';</script>";
}
?>
