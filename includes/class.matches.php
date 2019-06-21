<?php
class matches{

	function getMatchDetails($username, $con){
		$sql = "select * from matches where user1_ID='$username'";

		$result = $con->query($sql);

		//$fullname = $row['first_name']." ".$row['last_name'];
		return $result;
	}


}

?>
