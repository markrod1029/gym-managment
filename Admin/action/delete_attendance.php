

<?php
	include 'conn.php';
	
	$id = $_GET['id'];
		$sql = "DELETE FROM announcements WHERE id = '$id'";
		
        if($conn->query($sql)){
            echo "<html><head><script>alert('Atttendance Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../attendance_report.php'>";
		}
		else{
            echo "<html><head><script>alert('Atttendance Not Deleted');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=../attendance_report.php'>";
		}

	header('location: ../annoucement.php');
	
?>