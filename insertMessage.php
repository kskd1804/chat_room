<?php
if(isset($_POST['message'])){
	$con = mysqli_connect("localhost","root","","chatapp");
	if(mysqli_connect_errno()){
		die('Couldn\'t connect to database!');		
	}else{
		$name = mysqli_real_escape_string($con,$_POST['name']);
		$message = mysqli_real_escape_string($con,$_POST['message']);
		$sql = "INSERT INTO `messages` (name,body) VALUES ('$name','$message')";
		$query = mysqli_query($con,$sql);
		if($query)
		{
			echo "1";
		}else{
			echo mysqli_error($con);
		}
	}
}
?>