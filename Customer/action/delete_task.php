

<?php
	include 'conn.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM todo WHERE id = '$id'";
		
        if($conn->query($sql)){
            echo "<html><head><script>alert('Member Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
		}
		else{
            echo "<html><head><script>alert('Member Not Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../member_task.php'>";
		}

	header('location: ../member_task.php');
	
?>