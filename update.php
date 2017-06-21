<!DOCTYPE html>
<html>
<?php
$link = mysqli_connect('localhost', 'root', '', 'test') or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

$q = "SELECT * FROM notebook WHERE date='".$_REQUEST['id']."'";
$res = mysqli_query($link, $q) or die(mysqli_error($link));
for ($arr = []; $row = mysqli_fetch_assoc($res); $arr = $row);
	
$name = $arr['name'];
$text = $arr['text'];
$id = $_REQUEST['id'];


?>
<head>
	<title>Редактирование</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://theory.phphtml.net/css/bootstrap/css/bootstrap.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="wrapper">
		<h1>Редактировать запись</h1>
		<div>
		<a href="notebook.php">На главную</a>
			<form method="POST" action="note.php">
				<input type="hidden" name="id" value="<?=$id?>">
				<p>
					<input type="text" class="form-control" name="new_name" value="<?=$name?>">
				</p> 
				<p><textarea class="form-control" name="new_text"><?=$text?></textarea></p>
				<p><input type="submit" class="btn btn-danger btn-block" value="Сохранить"></p>
			</form>
		</div>
	</div>
</body>
</html>