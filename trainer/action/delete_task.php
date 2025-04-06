<?php
include '../conn.php';
include '../layout/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Validate ID
    if (!is_numeric($id)) {
        $_SESSION['error'] = "Invalid Task ID.";
        header("Location: ../home.php");
        exit();
    }

    // Prepare and Execute DELETE Query
    $stmt = $conn->prepare("DELETE FROM todo WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Workout Task Deleted Successfully";
    } else {
        $_SESSION['error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect Back to Task Page
    header("Location: ../home.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid request.";
    header("Location: ../home.php");
    exit();
}
?>
