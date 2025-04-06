<?php
  include 'session.php';

  if(isset($_POST['save'])){
      $fname = $_POST["fname"];    
      $mname = $_POST["mname"];    
      $lname = $_POST["lname"]; 
      $email = $_POST["email"];
      $gender = $_POST["gender"];
      $contact = $_POST["contact"];
      $address = $_POST["address"];
      $id = $_POST["id"];
      
      // Check if password field is empty
      if (!empty($_POST['password'])) {
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $password_query = ", password='$password'";
      } else {
          $password_query = ""; // Keep existing password
      }

      // Update query
      $qry = "UPDATE staffs SET fname='$fname', mname='$mname', lname='$lname', email='$email', 
              gender='$gender', contact='$contact', address='$address' $password_query WHERE user_id='$id'";

      if($conn->query($qry)){
          $_SESSION['success'] = 'Trainer Updated Successfully';
      } else {
          $_SESSION['error'] = $conn->error;
      }

      // Redirect back to profile page
      echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";
  } else {
      $_SESSION['error'] = 'Fill up add form first';
      echo "<meta http-equiv='refresh' content='0; url=../profile.php'>";
  }
  ?>
