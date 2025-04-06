<?php
include 'conn.php';

if(isset($_POST['save'])){
  $fullname = $_POST["fullname"];    
  $username = $_POST["username"];
  $password = $_POST["password"];
  $gender = $_POST["gender"];
  $services = $_POST["services"];
  // $paid_date='$curr_date';
  $amount = $_POST["amount"];
  $p_year = date('Y');
  $paid_date = date("Y-m-d");
  $plan = $_POST["plan"];
  $address = $_POST["address"];
  $contact = $_POST["contact"];

  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $totalamount = $amount * $plan;
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull
$qry = "INSERT INTO members(fullname,username,password,dor,gender,services,amount,p_year,paid_date,plan,address,contact) 
values ('$fullname','$username','$password', NOW(),'$gender','$services','$totalamount','$p_year','$paid_date','$plan','$address','$contact')";
$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo "<html><head><script>alert('Member Not Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
}else {

    echo "<html><head><script>alert('Member Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member.php'>";

}

}else{
    echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
}


          
?>