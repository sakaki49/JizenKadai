//課題1

<?php
	//データベースに接続
	$mysqli = new mysqli('localhost','root','','db');

	//JSONのデータを入れる配列を作る
	$json = array();

	//作成日順に並べ替えるSQLコード
	$result = $mysqli->query("SELECT * FROM shouhin ORDER BY created DESC");

	//並べ替えたデータを配列に格納
	if($result){
		while($row = $result->fetch_object()){
			$json[] = $row;
		}
	}

	//出力
	print json_encode($json);
?>