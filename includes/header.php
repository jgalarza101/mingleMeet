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
<html>
	<head>
		<title> <?php echo $title ?> </title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, inital-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link href="https://fonts.googleapis.com/css?family=Lobster|Raleway|Montserrat|Open+Sans" rel="stylesheet">
