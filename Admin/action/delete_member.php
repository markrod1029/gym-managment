

<?php
	include 'session.php';
	
	$id = $_GET['id'];
		$qry = "DELETE FROM members WHERE user_id = '$id'";
		
      
if($conn->query($qry)){
    $_SESSION['success'] = 'Member Deleted Successfully';

    echo "<meta http-equiv='refresh' content='0; url=../member.php'>";
}else {

	$_SESSION['error'] = $conn->error;
    echo "<meta http-equiv='refresh' content='0; url=../member.php'>";

}
	
?>