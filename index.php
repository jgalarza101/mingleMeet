<?php
	$title = "MingleMeet";
	include "includes/header.php";
?>
	<style>
	.body{
		background-image: url(images/Happy-couple.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-position: center;
	}

	.container{
		border-radius: 15px;

	}

	.body > header{
		background-color:rgba(1, 60, 74, 0.5);
		margin-bottom: 1em;
		font-family: 'Montserrat', sans-serif;
	}

	h2, h4, p{
		color: white;
	}

	body img{
		border-radius: 15px;
	}
	</style>
</head>
<body class="body">
		<header>
			<h1><a href="index.php"> MingleMeet</a> </h1>
		</header>
		<div class="container" style="background-color:rgba(20, 52, 57, 0.55)">
            <h2> Who is hooking up in the world? Find out what people are looking for relationship right now! No credit card needed! Nice and easy to use!</h2>
			<section class="row buttons">
				<div class="col-sm-6">
					<a href="login.php" class="btn btn-success btn-lg"> Login Now </a>
				</div>
				<div class="col-sm-6">
					<a href="register.php" class="btn btn-primary btn-lg"> Register Now</a>
				</div>
			</section>
			<section class="row tweets">
				<h2> People you could match with right now!*</h2>
				<div class="tweet">
					<img src="images/Jessica-Jones.jpg" style="width:100px; height:100px" class="pull-left" />
					<h4>Jessica Jones</h4>
					<p>Hells Kitchen, New York</p>
				</div>
				<div class="clearfix"></div>
				<div class="tweet">
					<img src="images/Kevin-Spacey.jpg" style="width:100px; height:100px" class="pull-left" />
					<h4>Kevin Spacey</h4>
					<p>South Orange, New Jersey</p>
				</div>
				<div class="clearfix"></div>
				<div class="tweet">
					<img src="images/Bad-Luck-Brian.jpeg" style="width:100px; height:100px" class="pull-left" />
					<h4>Brian McLovin</h4>
					<p>Bad Luck Town, Florida</p>
				</div>
			</section>
			<p>* Users may not find these people active anymore </p>
		</div>
	</body>
</html>
