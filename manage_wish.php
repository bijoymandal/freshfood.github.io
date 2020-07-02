<?php 
	require('./functions/functions.php');
	
	$pid = mysqli_real_escape_string($conn,$_POST['wid']);
	$type = mysqli_real_escape_string($conn,$_POST['wtype']);
	if(isset($_SESSION['user_login']))
	{
		
	}
	else
	{
		echo "not_login";
	}
	
	
	
	
	
?>