<?php
include 'session.php';

error_reporting(0);


if(isset($_POST['save'])){
    $id = $_POST["id"];
    $task_status = $_POST["task_status"];
    $title = $_POST["title"];
    $start_datetime = $_POST["start_datetime"];
    $end_datetime = $_POST["end_datetime"];
    
    $checkbox1=$_POST['workout'];  
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk .= $chk1.",";  
       }  
     
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull

$qry = "update todo set task_status='$task_status', title='$title', description='$chk', start_datetime='$start_datetime', end_datetime='$end_datetime' where id='$id'";

if($conn->query($qry)){
	$_SESSION['success'] = 'Workout Task Updated Successfully';
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
}

else {

	$_SESSION['error'] = $conn->error;
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";

}

}else{
    $_SESSION['error'] = 'Fill up add form first';
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";

}


          
?>