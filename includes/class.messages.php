<?php
class messages{
	function getUser1($username, $con){
		$sql = "select * from matches where user1_ID='$username'";

		$result = $con->query($sql);

		return $result;
	}

	function getUser2($username, $con){
		$sql = "select * from matches where user2_ID='$username'";

		$result = $con->query($sql);

		return $result;
	}

	function messageUser2($username, $username2, $messageContent, $dateMessaged, $con){
		$sql = "insert into message(sender_user_ID, receiver_user_ID, content, date_stamp) values ('$username', '$username2', '$messageContent', '$dateMessaged')";

		if($con->query($sql) === TRUE){
			return "success";
		}
		else{
			return "error";
		}
	}

}

?>
