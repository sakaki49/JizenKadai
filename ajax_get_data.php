<?php
	$mysqli = new mysqli('localhost','root','','db');
	$json = array();
	$result = $mysqli->query("SELECT * FROM shouhin ORDER BY created DESC");

	if($result){
		while($row = $result->fetch_object()){
			$json[] = $row;
		}
	}

	print json_encode($json);
?>