
 
<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM todo WHERE id = '$id'";
		
        if($conn->query($sql)){
			$_SESSION['success'] = 'Workout Task Deleted Successfully';
            echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
		}
		else{
			$_SESSION['error'] = $conn->error;
            echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
		}

	
?>