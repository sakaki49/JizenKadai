<?php
	//TODO　検索機能、追加機能の実装
	$mysqli = new mysqli('localhost', 'root', '', 'db');
	$status = "none";
	$search = 0;

	$result = $mysqli->query("select * from shouhin order by created asc");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>商品一覧</title>
	</head>

	<body>
		<h1>商品一覧</h1><br>

		<h4>検索</h4>
		<form method="post" action="shouhin.php">
			商品名から：<input name="name_s" placeholder="(例)udon"><br>
			説明文から：<input name="info_s" placeholder="(例)oishii"><br>
			価格から　：<input name="price_s" placeholder="(例)300"><br>
			店舗から　：<input name="store_s" placeholder="(例)Japan">
			<input type="submit" value="検索"><br><br>
			商品を追加する：<input type="button" onClick="location.href='../shouhin_add.php'" value="商品追加へ"><br>
			商品を削除する：<input type="button" onClick="location.href='../shouhin_delete.php'" value="商品削除へ">
		</form>
		<br>


		<hr />

		<?php 
			if($result){
				while($row = $result->fetch_object()){
					$name = htmlspecialchars($row->name);
					$info = htmlspecialchars($row->info);
					$price = htmlspecialchars($row->price);
					$store = htmlspecialchars($row->store);
					$image = htmlspecialchars($row->image);
					$image_2 = 'image/'.$image;
	
					print("商品名：$name<br>");
					print("説明：$info<br>");
					print("価格：$price(円)<br>");
					print("取り扱い店舗：$store<br>");
					print("画像：<img src=$image_2 width=300 height=200><br> ");
					print("<hr /><br>");
				}
			}
		 ?>
	</body>
</html>