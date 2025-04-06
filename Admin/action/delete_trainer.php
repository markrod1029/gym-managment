

<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$qry = "DELETE FROM staffs WHERE user_id = '$id'";
		
        
if($conn->query($qry)){

    $_SESSION['success'] = 'Trainer Deleted Successfully';
echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";

}else {

$_SESSION['error'] = $conn->error;
echo "<meta http-equiv='refresh' content='0; url=../trainer.php'>";

}


	
?>