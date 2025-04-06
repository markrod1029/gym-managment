<?php
include 'session.php';

if(isset($_POST['save'])){
    $task_service = $_POST["workout_id"];
    $exercises = $_POST["exercises"];
    $task = $_POST["task"];
    $id = $_POST["id"];
    
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull

$qry = "update workout set task='$task',exercises ='$exercises',workout_id='$task_service' where id='$id'";

if($conn->query($qry)){
    $_SESSION['success'] = 'Workout Updated Successfully';
    echo "<meta http-equiv='refresh' content='0; url=../workout.php'>";
}else {

    $_SESSION['error'] = $conn->error;

    echo "<meta http-equiv='refresh' content='0; url=../workout.php'>";

}

}else{
    $_SESSION['error'] = 'Fill up add form first';

    echo "<meta http-equiv='refresh' content='0; url=../workout.php'>";
}


          
?>