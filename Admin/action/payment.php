<?php
include 'session.php';

if(isset($_POST['save'])){

    $fullname = $_POST['fullname'];
    $paid_date = $_POST['paid_date'];
    // $p_year = date('Y');
    $amount = $_POST["amount"];
    $plan = $_POST["plan"];
    $status = $_POST["status"];
    $id=$_POST['id'];

      $amountpayable = $amount * $plan;


      date_default_timezone_set('Asia/Manila');
      //$current_date = date('Y-m-d h:i:s');
          $current_date = date('Y-m-d h:i A');
          $exp_date_time = explode(' ', $current_date);
          $curr_date =  $exp_date_time['0'];
          $curr_time =  $exp_date_time['1']. ' ' .$exp_date_time['2'];
      //code after connection is successfull
      //update query
      $qry = "UPDATE members SET amount='$amountpayable', plan='$plan', status='$status', paid_date='$curr_date' WHERE user_id='$id'";
      
      if($conn->query($qry)){
        $_SESSION['success'] = 'Member Updated Status Successfully';
    echo "<meta http-equiv='refresh' content='0; url=../member_status.php'>";
}else {

    $_SESSION['error'] = $conn->error;
    echo "<meta http-equiv='refresh' content='0; url=../member_status.php'>";

}

}else{
    $_SESSION['error'] = 'Fill up add form first';
    echo "<meta http-equiv='refresh' content='0; url=../member_status.php'>";
}


          
?>