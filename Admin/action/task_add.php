<?php
include 'session.php';

error_reporting(0);


if(isset($_POST['save'])){
    $id = $_POST["id"];
    $task_status = $_POST["task_status"];
    $title = $_POST["title"];
    $workout_id = $_POST["workout_id"];
    $start_datetime = $_POST["start_datetime"];
    $end_datetime = $_POST["end_datetime"];
    
    $checkbox1=$_POST['workout'];  
    $chk="";  
    foreach($checkbox1 as $chk1)  
       {  
          $chk .= $chk1.",";  
       }  

$qry = "insert into todo(task_status,title,description,user_id,workout_id,start_datetime,end_datetime,date) values ('$task_status','$title','$chk','$id','$workout_id','$start_datetime','$end_datetime', NOW())";

if($conn->query($qry)){

    	$_SESSION['success'] = 'Workout Task added Successfully';
    echo "<meta http-equiv='refresh' content='0; url=../home.php'>";

}else {

	$_SESSION['error'] = $conn->error;
    echo "<meta http-equiv='refresh' content='0; url=../home.php'>";

}

}else{
    $_SESSION['error'] = 'Fill up add form first';
    echo "<meta http-equiv='refresh' content='0; url=../home.php'>";

}

          
?>