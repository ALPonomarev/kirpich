<?php
session_start();
?>

<!DOCTYPE html>

<html lang="ru">
	<head>
		<title>Гипсовый кирпич в Новосибирске</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="normalize.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
		<meta charset="utf-8">		
	</head>
	
	<header>
		<?php
	    	require_once("header.php");
		?>
	</header>

	<body>
		<?php
		require_once('connection.php');
		$query=mysqli_query($connection, "SELECT * FROM `catalog`"); 
		$rows=mysqli_num_rows($query);?>
		<form action="addBasket.php" method="post" name="priceform">
			<div class="prlist">
				<?php
				for($i;$i<$rows;$i++)
				{
					$a=mysqli_fetch_assoc($query);
				?>
				<div class="elemprice">
					<p><b><?php echo $a['Brick']; ?> кирпич</b></p>
					<img class="foto_brick" src="IMG/<?php echo $a['Picture'] ?>"/>				
					<p>Размер плитки: <?php echo $a['Size']; ?></p>
					<p>Цена за M<sup>2</sup>: <?php echo $a['PriceM2']; ?> руб.</p>
					<p>Количество для заказа<input class="change_amount" value=<?php echo ($_SESSION[$b]); ?>"" type="amount" size="2" name=<?php echo $a['ID'] ?> ></p>
				</div>
				<?php
				}
				?>
			</div>

			<div class="attantion">
				<?php
	   			if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
				?>
				<p>Для активации корзины и возможности добавления товара нужно авторизироваться</p>
				<?php
				}
				
				else
				{
				//Если пользователь авторизован, то выводим ссылку Выход
				?> 
				<input class="addcart" type="submit" name="addBasket<?php echo $a['ID'] ?>" value="Добавить В Корзину">
				<?php
				}				    
				?>
			</div>
		</form>

		<!-- *** Прошлая версия прайс-листа в табличном виде*** -->

		<!--<form action="addBasket.php" method="post" name="priceform">
		<div class="price">
		
			<table width=75% bordercolor="black" border="2">
				<tr class="bold_table">
					<td></td>
					<td align="center">Наименование</td>
					<td class="del_td" align="center">Размер плитки</td>
					<td align="center">Цена за 1 м2</td>
					<td class="del_td" align="center">Цена за 1 шт</td>
					<td align="center">Укажите количество м2</td>
					<td></td>
				</tr>
				<?php
				for($i;$i<$rows;$i++)

				{
					
					$a=mysqli_fetch_assoc($query);
				?>

				<tr class="table">
					<td><img class="foto_brick" src="IMG/<?php echo $a['Picture'] ?>"/></td>
					<td vertical-align="center" align="center"><?php echo $a['Brick']; ?> кирпич</td>
					<td class="del_td" align="center"><?php echo $a['Size']; ?></td>
					<td align="center"><?php echo $a['PriceM2']; ?> руб.</td>
					<td class="del_td" align="center"><?php echo $a['PriceThing']; ?> руб.</td>
					<td align="center"><input class="change_amount" value=<?php echo ($_SESSION[$b]); ?>"" type="amount" size="2" name=<?php echo $a['ID'] ?> ></td>
					<?php
	   				if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
					?>			
						<td align="center">Для возможности добавления товара нужно авторизироваться</td>
					<?php
				    }
				    else
				    {
				        //Если пользователь авторизован, то выводим ссылку Выход
					?> 

					<td><input type="submit" name="addBasket<?php echo $a['ID'] ?>" value="В Корзину"></td>
					<?php
				    }				    
					?>

				</tr>
				<?php
				}

				?>
			</table>

		
		</div>
		</form>-->
	</body>
	
	<footer>
		<?php
    	require_once("footer.php");
		?>
	</footer>
</html>