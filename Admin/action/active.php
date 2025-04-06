<?php
include 'conn.php';
    $id = $_GET['id'];
    $status = "Deactive";

    $qry = "update staffs set status='$status' where user_id='$id'";
$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo "<html><head><script>alert('Trainer Status Not Updated');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";
}else {

    echo "<html><head><script>alert('Trainer Status Updated');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";

}

?>