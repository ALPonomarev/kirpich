<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<?php
	require_once('connection.php');
	
	$query=mysqli_query($connection, "SELECT * FROM main WHERE Page='about'");// Текст статьи
	//$query2=mysqli_query($connection, "SELECT * FROM authors,albums WHERE au-thors.id=albums.id_author"); // работа с блоком Новинки
	//$rows=mysqli_num_rows($query2);

?>

<html>
	<?php
	$a=mysqli_fetch_assoc($query);
	?>

	<head>
		<title>Гипсовый кирпич в Новосибирске</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="normalize.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
		<meta charset="utf-8">
	</head>
	
	<header>
	<?php require_once("header.php")?>
	</header>
	
	<body>
		<div class="general">
			<div class="image">
				<img class="small" src="IMG/Укладка.jpg">
			</div>
			<div class="special">
				<p><?php echo nl2br($a['Article']); ?>	</p>
			</div>
		</div>
		<h2 align="center" class="ourprod">Продукция, выпускаемая нами</h2>
<!-- Блок с информацией о нашей продукции -->
		<div class="product">

			<div class="Foto">
				<div class="brik">
					<a class="link" href="Old.html">
						<p>Старый кирпич</p>
						<img class="ico" src="IMG/Венецианский.jpg">			
					</a>
					<div>	
						<ul class="enumeration">
							<li>Тип: каменные обои, ультратонкие</li>
							<li>Размер одной плитки, мм: 240 х 65 х 9</li>
							<li>Количество плиток в м2 - 64шт</li>
						</ul>
					</div>
				</div>

				<div class="brik">
					<a class="link" href="Vertik.html">
						<p>Вертикальный кирпич</p>
						<img class="ico" src="IMG/Вертикальный.jpg">			
					</a>
					<div>
						<ul class="enumeration">
							<li>Тип: каменные обои, ультратонкие</li>
							<li>Размер одной плитки, мм: 240 х 62 х 10</li>
							<li>Количество плиток в м2 - 67шт</li>
						</ul>
					</div>
				</div>
					
				<div class="brik">
					<a class="link" href="Classik.html">
						<p>Классический кирпич</p>
						<img class="ico" src="IMG/Классический.jpg">
					</a>
					<div>
						<ul class="enumeration">
							<li>Тип: каменные обои, ультратонкие</li>
							<li>Размер одной плитки, мм: 240 х 63 х 8</li>
							<li>Количество плиток в м2 - 66шт</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</body>

	<footer>
		<?php require_once("footer.php")?>
	</footer>
</html>