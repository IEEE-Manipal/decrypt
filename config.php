<?php
$dbhost="103.50.162.66";
$dbuser="kodamr13_ieee";
$dbpass="hatemane@1";
$dbname="kodamr13_ieeemanipal";
$connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(mysqli_connect_errno()){
	die("Database cant load"); 
}
// $dbhost="localhost";
// $dbuser="root";
// $dbpass="qwerty123456";
// $dbname="decrypt";
// $connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
// if(mysqli_connect_errno()){
// 	die("Database cant load"); 
// }
?>