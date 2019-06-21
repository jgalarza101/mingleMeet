<?php
function sanitizeString($var){
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	$var = trim($var);
	return $var;
}
 ?>
<!DOCTYPE html>
<head>
	<title><?php echo $title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" id="bootstrap-css" />
	<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa|Lobster|Lobster+Two" rel="stylesheet">
</head>
<html>
	<body>
