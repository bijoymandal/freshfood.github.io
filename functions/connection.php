<?php
    session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "freshneeds";
	
	$conn = mysqli_connect($servername,$username,$password,$database);
	if(!$conn)
	{
		die("connection failed");
	}
	/*else
	{
		die("connection successfully");
	}*/		
		
	
?>