<?php
include "includes/db.php";
$username = $firstName = $lastName = $age = $email = $password = $cityName = $stateName = $aboutMe = $gender = "";
$usernameErr = $fnameErr = $lnameErr = $ageErr = $emailErr = $passErr = $imgErr = $cityNameErr = $stateNameErr = $aboutErr = $genderErr = "";
$registerDone = "";

if(isset($_POST['btn-register'])){
	if(trim($_POST['username']) == "") //trim function removes spaces from left and right
		$usernameErr ="enter username";
	else{
		$username = strtolower(trim($_POST['username'])); //strtolower function converts string to lowercase;

		$sqlUsername = "select * from user where username='$username'";
		$result = $con->query($sqlUsername);
		if($result->num_rows >0)
			$usernameErr = "username exists";
	}

	if(trim($_POST['firstName'])=="")
		$fnameErr = "enter first name";
	else
		$firstName = ucfirst(strtolower(trim($_POST['firstName']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['lastName'])=="")
		$lnameErr = "enter last name";
	else
		$lastName = ucfirst(strtolower(trim($_POST['lastName']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['age'])=="")
		$ageErr = "enter your age";
	else
		$age = ucfirst(strtolower(trim($_POST['age']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['cityName'])=="")
		$cityNameErr = "enter city name of where you live";
	else
		$cityName = ucfirst(strtolower(trim($_POST['cityName']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['stateName'])=="")
		$stateNameErr = "enter state name of where you live";
	else
		$stateName = ucfirst(strtolower(trim($_POST['stateName']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['aboutMe'])=="")
		$aboutErr = "enter a little description about yourself";
	else
		$aboutMe = ucfirst(strtolower(trim($_POST['aboutMe']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['gender'])=="")
		$genderErr = "enter your gender";
	else
		$gender = ucfirst(strtolower(trim($_POST['gender']))); //ucfirst is going to convert first letter of the string to uppercase

	if(trim($_POST['email']) == "") //trim function removes spaces from left and right
		$emailErr ="enter email address";
	else{
		$email = strtolower(trim($_POST['email'])); //strtolower function converts string to lowercase;

		$sqlEmail = "select * from user where user_email='$email'";
		$resultEmail = $con->query($sqlEmail);
		if($resultEmail->num_rows >0)
			$emailErr = "email exists";
	}

	if(trim($_POST['password'])=="")
		$passErr = "enter password";
	else {
		$password = trim($_POST['password']);
		$passwordEncrypt = md5($password);//md5 is used to encrypt the password
	}

	if(getimagesize($_FILES['profileimage']['tmp_name']) !== false){
		$fileLoc = $_FILES['profileimage']['tmp_name'];
		$imgContent = addslashes(file_get_contents($fileLoc)); // file_get_contents gets the contents of the image to be uploaded to the database
	}
	else
		$imgErr = "upload an image";

	if($usernameErr=="" && $fnameErr=="" && $lnameErr=="" && $ageErr=="" && $emailErr=="" && $passErr=="" && $imgErr=="" && $cityNameErr=="" && $stateNameErr=="" && $aboutErr=="" && $genderErr==""){

		$sql = "insert into user(username, first_name, last_name, user_age, user_email, password, picture, usa_city, usa_state, about_me, gender) values ('$username', '$firstName', '$lastName', '$age', '$email', '$passwordEncrypt', '$imgContent', '$cityName', '$stateName', '$aboutMe', '$gender')";

		if($con->query($sql) === TRUE){
			$registerDone = "New user added successfully";
			$username = $firstName = $lastName = $age = $email = $password = $cityName = $stateName = $aboutMe = $gender == "";
		}
		else{
			echo "Error ".$con->error;
		}

	}


}
$title = "Register to MingleMeet";
include "includes/header.php";
?>
<style>
	.body{
		background-image: url(images/Couple-holding-hands.jpg);
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
		font-family: 'Montserrat', sans-serif;
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
					<h2> Register Now! </h2>
					<p class="text-center"> Fill in the following fields, to create an account</p>
					<p class="text-success"> <?php echo $registerDone ?></p>
					<form method="post" action="register.php" enctype="multipart/form-data"> <!-- enctype is needed when submitting images using the form -->

						<label>Username </label>&nbsp;<span class="error"><?php echo $usernameErr ?></span>
						<input type="text" maxlength="20" placeholder="Enter Username" name="username" class="form-control" value="<?php echo $username ?>" />

						<label>First Name </label>&nbsp;<span class="error"><?php echo $fnameErr ?></span>
						<input type="text" maxlength="30" placeholder="Enter First Name" name="firstName" class="form-control" value="<?php echo $firstName ?>" />

						<label>Last Name </label>&nbsp;<span class="error"><?php echo $lnameErr ?></span>
						<input type="text" maxlength="30" placeholder="Enter Last Name" name="lastName" class="form-control" value="<?php echo $lastName ?>" />

						<label>Age </label>&nbsp;<span class="error"><?php echo $ageErr ?></span>
						<input type="text" maxlength="3" placeholder="Enter Your Age" name="age" class="form-control" value="<?php echo $age ?>" />

						<label>City </label>&nbsp;<span class="error"><?php echo $cityNameErr ?></span>
						<input type="text" maxlength="20" placeholder="Enter City Name" name="cityName" class="form-control" value="<?php echo $cityName ?>" />

						<label>State </label>&nbsp;<span class="error"><?php echo $stateNameErr ?></span>
						<input type="text" maxlength="20" placeholder="Enter State Name" name="stateName" class="form-control" value="<?php echo $stateName ?>" />

						<label>About Yourself </label>&nbsp;<span class="error"><?php echo $aboutErr ?></span>
						<input type="text" maxlength="400" placeholder="Enter About Yourself" name="aboutMe" class="form-control" value="<?php echo $aboutMe ?>" />

						<label>Gender </label>&nbsp;<span class="error"><?php echo $genderErr ?></span>
						<input type="text" maxlength="8" placeholder="Enter Your Gender" name="gender" class="form-control" value="<?php echo $gender ?>" />

						<label>Email Address </label>&nbsp;<span class="error"><?php echo $emailErr ?></span>
						<input type="text" maxlength="100" placeholder="Enter Email Address" name="email" class="form-control" value="<?php echo $email ?>" />

						<label>Password </label>&nbsp;<span class="error"><?php echo $passErr ?></span>
						<input type="password" placeholder="Enter Password" name="password" class="form-control" value="<?php echo $password ?>" />

						<label> Upload Image </label>&nbsp;<span class="error"><?php echo $imgErr ?></span>
						<input type="file" name="profileimage" />

						<input type="submit" name="btn-register" class="btn btn-success form-control submit-button" />

						<br><br>Already have an account? <a href="login.php" style="color: white; text-decoration: underline"> Login Here </a>
						<br><br>

					</form>
				</div>
			</div>
		</div>
	</body>
</html>
