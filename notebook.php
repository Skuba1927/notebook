<!DOCTYPE html>
<html>
	<head>
		<title>Главная</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="http://theory.phphtml.net/css/bootstrap/css/bootstrap.css">
	</head>
	<body>
		<div id="wrapper">
			<h1>Список записей</h1>
			<?php 
			$link = mysqli_connect('localhost', 'root', '', 'test') or die(mysqli_error($link));
			mysqli_query($link, "SET NAMES 'utf8'");
			
			if(!empty($_REQUEST['name']) && !empty($_REQUEST['text'])) {
				$q = "INSERT INTO notebook (name, text) VALUES ('".
				$_REQUEST['name']."', '".$_REQUEST['text']."')";
				$result = mysqli_query($link, $q);
				header("Location: notebook.php");
				exit;
			}
			
			if (isset($_REQUEST['del'])) {
				$q = "DELETE FROM notebook WHERE date='".$_REQUEST['del']."'";
				mysqli_query($link, $q) or die(mysqli_error($link));
			}
			
			$q = "SELECT * FROM notebook ORDER BY date DESC";
			$result = mysqli_query($link, $q) or die(mysqli_error($link));
			for ($array = []; $row = mysqli_fetch_assoc($result); $array[] = $row);
			
			foreach ($array as $value) {
				echo "<div class='note'>
						<p>
							<span class='date'>".$value['date']."
							</span>";
				echo "		<a href='note.php?id=".$value['date']."'> ".$value['name']."
						</a>
				</p>";
				echo "<p class = 'clip'>".
				mb_strimwidth(strip_tags($value['text']), 0, 350, '...')
				."
				</p>
				</div>";
			}
			
			
			?>
		<div>
			<a href="addition.php" class = " btn btn-danger btn-block">Добавить запись</a>
		</div>
		</div>
	</body>
</html>