<?php
if(!empty($_POST["name"]) && !empty($_POST["message"])){
  $mysqli = new mysqli('localhost', 'root', '', 'board');
  $stmt = $mysqli->prepare("INSERT INTO datas (name, message) VALUES (?, ?)");
  $stmt->bind_param('ss', $_POST["name"], $_POST["message"]);
  $stmt->execute();
}
?>