<?php
class user{

	function getUserDetails($username, $con){
		$sql = "select * from user where username='$username'";

		$result = $con->query($sql);
		$row = $result->fetch_assoc();

		//$fullname = $row['first_name']." ".$row['last_name'];
		return $row;
	}


	function getLoggedin($username, $con){
		$sql = "select first_name, last_name from user where username='$username'";

		$result = $con->query($sql);
		$row = $result->fetch_assoc();

		$fullname = $row['first_name']." ".$row['last_name'];
		return $fullname;
	}

	function getOtherUsers($username, $con){
		$sql = "select * from user where username !='$username'";

		$result = $con->query($sql);

		return $result;
	}

	function isLiked($username, $matchId, $user1ID, $user2ID, $con){
		
	}

}

?>
