<?php
session_start();

require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");	
    #print_r($_SESSION);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];

		if (empty($name) && empty($username) && empty($password) && empty($email))
		{
			echo "<span class='error'>Field must not be empty! </span>";
		}
		else
		{
		  $query = "INSERT INTO tbl_member(name,username,email,password)VALUES ('$name','$username','$email','$password')";  
		  $inserted_rows = mysqli_query( $connect,$query)
		  or die("Can not execute query");

		  if ($inserted_rows) {
			  echo "<span class='success'>Registration Successful. </span>";
		  }else{
			  echo "<span class='success'>Registration Not Successful</span>";
		  }
		}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Member Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<div class="containter ">
		<div class="row mt-5 ">
			<div class="card col-5 offset-lg-4 hero-card">
				<h2 class="text-dark display-4 d-flex justify-content-center">Member Registration:</h2>
				<hr>

	
				<form action="" method="POST" enctype="multipart/form-data" class="form-group">
					<label for="name">Your Name</label>:
					<input class="form-control" type="text" id="name" name="name" placeholder="Your Name">
					<br>
					<label for="username">Username</label>:
					<input class="form-control" type="username" id="username" name="username" placeholder="Username">
					<br>
					<label for="email">Email</label>:
					<input class="form-control" type="Email" id="email" name="email" placeholder="Email">
					<br>
					<label for="password">Password</label>:
					<input class="form-control" type="Password" id="password" name="password" placeholder="Password">
					<br>
					<input class="btn btn-danger col-2" type="submit" value="Submit">
					<br><br>
					<p><a href="memberlogin.php" class="btn-outline-danger">Want to go back login page?</a></p>
				</form>

			</div>
		</div>
	</div>

</body>

</html>
