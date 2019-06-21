<?php
session_start(); //this needs to exist when using $_SESSION

if(isset($_SESSION['username']))
	header("Location: home2.php");//header function is used to redirect to other php files

include "includes/db.php";

$username = $password = "";
$usernameErr = $passErr = "";
$loginErr = "";

if(isset($_POST['btn-login'])){
	if(trim($_POST['username'])=="")
		$usernameErr = "enter username";
	else
		$username = strtolower(trim($_POST['username']));


	if(trim($_POST['password'])=="")
		$passErr = "enter password";
	else {
		$password = trim($_POST['password']);
		$passwordEncrypt = md5($password);
	}

	if($usernameErr == "" && $passErr==""){
		$sql = "select * from user where username='$username' and password='$passwordEncrypt'";
		$result = $con->query($sql);

		if($result->num_rows > 0){
			$_SESSION['username'] = $username;
			header("Location: home2.php");
		}
		else{
			$loginErr = "Error logging in, please try again";
		}
	}

}
	$title="Login to Match Making Website";
	include "includes/header.php";
?>

	<style>
	.body{
		background-image: url(images/Happy-Couple-On-First-Date.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;
		color: white;
	}

	.container{
		border-radius: 15px;
	}

	.form-control{
		border-radius: 15px;
	}
	.body > header{
		background-color:rgba(1, 60, 74, 0.5);
		margin-bottom: 1em;
	}
	</style>
</head>
<body class="body">
		<header>
			<h1> <a href="index.php"> MingleMeet </a></h1>
		</header>

		<div class="container" style="background-color:rgba(20, 52, 57, 0.55)">
			<div class="row">
				<div class="col-sm-12">
					<h2> Login Now!</h2>
					<p class="text-center"> Enter your username and password to login </p>
					<p class="text-danger"> <?php echo $loginErr ?></p>
					<form method="post" action="login.php">
						<label>Username</label>&nbsp;<span class="error"><?php echo $usernameErr ?></span>
						<input type="text" maxlength="20" placeholder="Enter Username" name="username" class="form-control" value="<?php echo $username ?>" />

						<label>Password </label>&nbsp;<span class="error"><?php echo $passErr ?></span>
						<input type="password" placeholder="Enter Password" name="password" class="form-control" value="<?php echo $password ?>" />

						<input type="submit" name="btn-login" class="btn btn-success form-control submit-button" />

						<br><br> Don't have an account? <a href="register.php" style="color: white; text-decoration: underline"> Register Here </a>
						<br><br>

					</form>
				</div>
			</div>
		</div>

	</body>
</html>
