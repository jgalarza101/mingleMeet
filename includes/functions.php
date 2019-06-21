<?php
session_start();

include "db.php";
include "class.tweet.php";
include "class.messages.php";
include "class.matches.php";

$username = $_SESSION['username'];
$tweetob = new tweet();
$messagesob = new messages();
$matchesob = new matches();

$option = trim($_POST['option']);

if($option=='tweetforuser'){
	$tweetMessage = trim($_POST['tweetMessage']);
	$dateTweet = date('Y-m-d H:i:s');

	$result = $tweetob->tweetForUser($tweetMessage, $dateTweet, $username, $con);
	echo $result;

}
if($option=='followuser'){
	$following = trim($_POST['following']);

	$dateFollow = date('Y-m-d H:i:s');

	$result = $tweetob->followUser($following, $username, $dateFollow, $con);
	echo $result;
}

if($option=='messageforuser'){
	$messageContent = trim($_POST['messageContent']);
	$dateMessaged = date('Y-m-d H:i:s');

	$result = $messagesob->messageUser2($username, $username2, $messageContent, $dateMessaged, $con);
	echo result;
}
?>
