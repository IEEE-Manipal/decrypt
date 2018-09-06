<?php
session_start();
include("config.php");
if($_SESSION['log']!=911){
	header("Location: logout.php");
}
?>