<?php
include 'session.php';

if(isset($_POST['save'])){
    $task_status = $_POST["task_status"];
    $task_desc = $_POST["task_desc"];
    $user_id = $user['user_id'];
    
  // <!-- Visit codeastro.com for more projects -->
//code after connection is successfull

$qry = "insert into todo(task_status,task_desc,user_id) values ('$task_status','$task_desc','$user_id')";

$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo "<html><head><script>alert('Task Not Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
}else {

    echo "<html><head><script>alert('Task Added');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";

}

}else{
    echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
}


          
?>