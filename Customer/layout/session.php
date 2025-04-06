<?php
	session_start();
	include 'conn.php';

	if(!isset($_SESSION['member']) || trim($_SESSION['member']) == ''){
		header('location: home.php');
	}

	$sql = "SELECT * FROM members WHERE user_id = '".$_SESSION['member']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>