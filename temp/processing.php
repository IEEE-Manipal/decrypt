<?php
	include("session.php");
	include("config.php");

	$uid=$_SESSION["userid"];
	$status_query="SELECT status FROM login WHERE UID=$uid";
	$status_result=mysqli_query($connection,$status_query);
	$status_row=mysqli_fetch_assoc($status_result);

	$answer=$_POST["ans"];
	$answer = mysqli_real_escape_string($connection,$answer);
	$state=$status_row["status"];
	$answer_query="SELECT id FROM answers WHERE id='$state' AND answer='$answer'";
	$answer_result=mysqli_query($connection,$answer_query);
	$answer_row=mysqli_fetch_assoc($answer_result);
	$number=mysqli_num_rows($answer_result);
	if($number==1)
	{
		$state=$state+1;
		$update_query="UPDATE login SET status='$state' WHERE UID='$uid'";
		$update_result=mysqli_query($connection,$update_query);
		$score=$state-1;
		$update_query="UPDATE login SET score='$score' WHERE UID='$uid'";
		$update_result=mysqli_query($connection,$update_query);
		header("Location: home.php?ans=2");
	}
	else
	{
		header("Location: home.php?ans=0");
	}
?>