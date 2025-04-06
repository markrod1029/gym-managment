<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['trainer']) || trim($_SESSION['trainer']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM staffs WHERE user_id = '".$_SESSION['trainer']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>