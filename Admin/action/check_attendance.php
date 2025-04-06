<?php
include 'conn.php';

date_default_timezone_set('Asia/Manila');
 //$current_date = date('Y-m-d h:i:s');
    $current_date = date('Y-m-d h:i A');
   $exp_date_time = explode(' ', $current_date);
    $curr_date =  $exp_date_time['0'];
    $curr_time =  $exp_date_time['1']. ' ' .$exp_date_time['2'];
    $date_now = date('Y-m-d');

 //extract($_POST);

$user_id = $_GET['id'];


$sql = "INSERT INTO attendance (user_id, curr_date,curr_time,present,time_in)
VALUES ('$user_id','$curr_date','$curr_time',1, NOW())";


if ($conn->query($sql) === TRUE) {
$attend_count = 0;
$attend = "select * from members where user_id = '$user_id'";
$result_attend = $conn->query($attend);
$row_attend = mysqli_fetch_array($result_attend);
$cnt = $row_attend['attendance_count'];
 $attend_count = $attend_count + 1;
  $sql1 = "UPDATE members SET attendance_count = attendance_count + '$attend_count' where user_id='$user_id'";
  $conn->query($sql1) ;


  // $_SESSION['success']='Record Successfully Added';
   
  ?>
<script type="text/javascript">
window.location="../attendance.php";
</script>
<?php
} else {

   $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../attendance.php";
</script>
<?php
}
          
?>