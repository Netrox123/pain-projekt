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

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Błędna nazwa lub hasło!";
		}else
		{
			echo "Błędna nazwa lub hasło!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="stylee.css">
</head>
<body>
	<div id="box">
		<form id="hej" method="post">
			<h1 id="header">LOGIN</h1>
			<label for="username" id="label">Username</label>
			<br><input id="username" type="text" name="user_name"><br></br>
			<label for="password" id="label">Password</label>
			<br><input id="password" type="password" name="password"><br></br>

			<input id="button" type="submit" value="LOGIN"><br><br>
			<div class="line-1"></div>
			<a id="logout" href="signup.php">Click to Signup</
			a><br><br>
			<div class="line-2"></div>
		</form>
	</div>
	</div>
</body>
</html>