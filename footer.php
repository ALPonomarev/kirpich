<!DOCTYPE html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<footer class="footer">
		<div>
			<ul class="futmenu">
				<li><a class="link" href="about.php">О Нас</a></li>
				<!-- <li><a class="link" href="news.html">Новинки</a></li>-->
				<li><a class="link" href="price.php">Цены</a></li>
				<li><a class="link" href="review.php">Отзывы</a></li>
				<?php
				if(isset($_SESSION['login']) && isset($_SESSION['password'])){
				?>
				<li><a class="link" href="basket.php"><i class="fas fa-shopping-basket"></i>   Корзина</a></li>
				<?php
				}
				?>
			</ul>
		</div>
		<div class="futcontact">
			<p>Наш адресс: г. Новосибирск, ул. Озёрная</p>
			<p><i class="fas fa-mobile-alt"></i>   8 999 305 58 25</p>
			<p>Контактное лицо: Алексей</p>
		</div>


<!--Ссылки на разделы, адрес, телефон, контактное лицо, копирайты-->
	</footer>