<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Podaj prawidłowe dane	!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" href="stylee.css">
</head>
<body>
	<div id="box">
		<form method="post">
		<h1 id="header">SIGN UP</h1>
			<label for="username"id="label">Login</label>
			<br><input id="username" type="text" name="user_name"><br><br>
			<label for="password"id="label">Password</label>
			<br><input id="password" type="password" name="password"><br><br>
		
			<input id="button" type="submit" value="SIGNUP"><br><br>
			<div class="line-1"></div>
			<a id="logout" href="login.php">Click to Login</a><br><br>
			<div class="line-2"></div>
		</form>
	</div>
</body>
</html>