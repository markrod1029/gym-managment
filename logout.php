<?php
session_start();
require_once('conn.php');
session_destroy();
header("location: index.php");
exit();
?>