

<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$qry = "DELETE FROM workout WHERE id = '$id'";
		

		if($conn->query($qry)){
			$_SESSION['success'] = 'Workout Deleted Successfully';
			echo "<meta http-equiv='refresh' content='0; url=../workout.php'>";
		}else {
		
			$_SESSION['error'] = $conn->error;
		
			echo "<meta http-equiv='refresh' content='0; url=../workout.php'>";
		
		}
		
	
?>