<?php
include 'session.php';

if (isset($_POST['save'])) {
    $fname = $_POST["fname"];
    $mname = $_POST["mname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $id = $_POST["id"];

    // Check if password field is empty
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_query = ", password='$password',";
    } else {
        $password_query = ""; // Keep existing password
    }

    // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull
    $qry = "update members set fname='$fname', mname='$mname', lname='$lname', email='$email', $password_query gender='$gender',
  address='$address',
  contact='$contact' where user_id='$id'";
    $result = mysqli_query($conn, $qry); //query executes

    if ($conn->query($qry)) {
        $_SESSION['success'] = 'Member Updated Successfully';

        echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";
    } else {

        $_SESSION['error'] = $conn->error;
        echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";

    }

} else {
    $_SESSION['error'] = 'Fill up add form first';
    echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";

}



?>