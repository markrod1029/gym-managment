<?php
include 'conn.php';

if(isset($_POST['save'])){
    $task_desc = $_POST["task_desc"];    
    $task_status = $_POST["task_status"];
    $id = $_POST["id"];
    
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull

$qry = "update todo set task_desc='$task_desc', task_status='$task_status' where id='$id'";

$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo "<html><head><script>alert('Task Not Update');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
}else {

    echo "<html><head><script>alert('Task Update');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";

}

}else{
    echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
}


          
?>