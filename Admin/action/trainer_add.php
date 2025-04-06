<?php
include 'session.php';

if (isset($_POST['save'])) {
  $fname = $_POST["fname"];
  $mname = $_POST["mname"];
  $lname = $_POST["lname"];
  $password = $_POST["password"];
  $email = $_POST["email"];
  $address = $_POST["address"];
  $designation = "Trainer";
  $gender = $_POST["gender"];
  $contact = $_POST["contact"];
  $status = "Active";
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Gamitin ang tamang variable para hindi madoble

  // Check if email already exists
  $checkQuery = "SELECT * FROM staffs WHERE email = '$email'";
  $result = $conn->query($checkQuery);

  if ($result->num_rows > 0) {
    $_SESSION['error'] = 'Email already exists. Please use a different email.';
    echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";
  } else {
    // Insert new record
    $qry = "INSERT INTO staffs(fname, mname, lname, password, email, address, designation, gender, contact, status, role) 
                VALUES ('$fname', '$mname', '$lname', '$hashed_password', '$email', '$address', '$designation', '$gender', '$contact', '$status', 'Trainer')";

    if ($conn->query($qry)) {
      $_SESSION['success'] = 'Trainer Added Successfully';
      echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";
    } else {
      $_SESSION['error'] = $conn->error;
      echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";
    }
  }
} else {
  $_SESSION['error'] = 'Fill up add form first';
  echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";
}
?>