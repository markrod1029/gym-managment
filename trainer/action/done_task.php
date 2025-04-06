<?php
include 'conn.php';

    $task_status ="Done";
    $id = $_GET["id"];
    
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull

$qry = "update todo set  task_status='$task_status' where id='$id'";

$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo "<html><head><script>alert('Task Not Complete');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
}else {

    echo "<html><head><script>alert('Task Complete');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";

}



          
?>