<?php
$mysqli = new mysqli('localhost', 'root', '', 'board');
$json = array();
$result = $mysqli->query("SELECT * FROM datas ORDER BY created DESC");
if($result){
  while($row = $result->fetch_object()){
    $json[] = $row;
  }
}
print json_encode($json);
?>