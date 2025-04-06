

<?php
	include 'conn.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM members WHERE user_id = '$id'";
		
        if($conn->query($sql)){
            echo "<html><head><script>alert('Member Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
		}
		else{
            echo "<html><head><script>alert('Member Not Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
		}

	header('location: ../member.php');
	
?>