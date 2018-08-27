<?php
	$mysqli = new mysqli('localhost','root','','db');
	if(!empty($_post["name"]) && !empty($_post["info"]) && !empty($_post["price"]) && !empty($_post["store"]) && !empty($_files)){

		$filename = $_files['image']['name'];
		if($filename != ""){
			$image = $filename;
			move_uploaded_file($_files["image"]["tmp_name"],"/image".$image);
			$mysqli = sprintf("insert into shohin set image='%s'",$image);
		}
		$stmt = $mysqli->prepare("insert into shouhin (name,info,price,store) (?,?,?,?)");
		$stmt->bind_param('ssis',$_post["name"],$_post["info"],$_post["price"],$_post["store"]);
	}
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>商品追加</title>
	</head>

	<body>
		<h1>商品追加</h1>
		<form method="post" action="shouhin_add.php" enctype="multipart/form-data">
			商品名：<input name="name"><br>
			説明文：<input name="info"><br>
			価格　：<input name="price" placeholder="半角数字"><br>
			店舗　：<input name="store"><br>
			商品画像：<input type="file" name="image">
			<input type="submit" value="追加する">
		</form>
	</body>
</html>