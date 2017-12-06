<?php
$con = mysqli_connect("localhost","root","","chatapp");
if(mysqli_connect_errno()){
	die('Couldn\'t connect to database!');	
}else{
	$sql = "SELECT * FROM `messages`";
	$query = mysqli_query($con,$sql);
	if($query){
		while($messages = mysqli_fetch_assoc($query)){
			echo $messages['name'].": ".$messages['body']."<br>";
		}
	}
}
?>