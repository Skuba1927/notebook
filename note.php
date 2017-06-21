<!DOCTYPE html>
<?php
$link = mysqli_connect('localhost', 'root', '', 'test') or die(mysqli_error($link));
mysqli_query($link, "SET NAMES 'utf8'");

if (!empty($_REQUEST['new_name']) && !empty($_REQUEST['new_text'])) {
	$q = "UPDATE notebook SET name='".$_REQUEST['new_name']."', 
		text='".$_REQUEST['new_text']."' WHERE date='".$_REQUEST['id']."'";
	$res = mysqli_query($link, $q) or die(mysqli_error($link));
}

$q = "SELECT * FROM notebook WHERE date='".$_REQUEST['id']."'";
$res = mysqli_query($link, $q) or die(mysqli_error($link));
for ($arr = []; $row = mysqli_fetch_assoc($res); $arr = $row);
	
	$name = $arr['name'];
?>
<html>
<head>
	<title><?php echo $name?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="http://theory.phphtml.net/css/bootstrap/css/bootstrap.css">
</head>
<body>
	<div id="wrapper">
		<h1><?=$name?></h1>
			<?php
				echo "<div><p class='date'>".$arr['date']."  <a href='
					notebook.php'>На главную.</a></p>";
				echo "<p>".$arr['text']."</p></div>";
			?>
		<div>
			<a href = "update.php?id=<?=$_REQUEST['id']?>" class="btn btn-info btn-block">Редактировать</a>
			<p><form action="notebook.php" method="POST">
				<input type="hidden" name="del" value="<?=$_REQUEST['id']?>">
				<input type="submit" class="btn btn-danger btn-block" value="Удалить">
			</form></p>
		</div>
	</div>
</body>
</html>