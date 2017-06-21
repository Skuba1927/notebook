<!DOCTYPE html>
<html>
<?php
$link = mysqli_connect('localhost', 'root', '', 'test') or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");
?>
<head>
	<title>Добавление</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://theory.phphtml.net/css/bootstrap/css/bootstrap.css">
	<meta charset="utf-8">
</head>
<body>
	<div id="wrapper">
		<h1>Новая запись</h1>
		<div>
			<form method="POST" action="notebook.php">
				<input type="hidden" name="id" value="<?=$id?>">
				<p>
					<input type="text" class="form-control" name="name" placeholder="Название записи">
				</p> <br>
				<p><textarea class="form-control" name="text" placeholder="Текст"> </textarea></p>
				<p><input type="submit" class="btn btn-danger btn-block" value="Добавить"></p>
			</form>
		</div>
	</div>
</body>
</html>