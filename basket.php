<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
		
	<head>

		<title>Гипсовый кирпич в Новосибирске</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="normalize.css" rel="stylesheet">
		<link href="style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
		<meta charset="utf-8">
		<?php
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
   		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
		{
    	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} 
		else {
    	$ip = $_SERVER['REMOTE_ADDR'];
		}
		$login=$_SESSION['login'];
		require_once('connection.php');
		$catalog=mysqli_query($connection, "SELECT * FROM `catalog`"); 
		$request=mysqli_query($connection, "SELECT * FROM `basket` WHERE ip='$ip' and user='$login' ");
		$rows=mysqli_num_rows($catalog);?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="basket.js"></script>
	</head>
	
	<header>
		<?php
		require_once("header.php");
		?>
	</header>

 <body>
 	<h3>Корзина:</h3>
 	<table width=75% border="1">
 		<tr class="bold_table"><td align="center"></td>
 			<td align="center">Наименование</td>
 			<td align="center">цена за шт</td>
 			<td align="center">цена за 1 м2</td>
 			<td align="center">Количество м2</td>
 			<td align="center">Обзщая цена</td>
 		</tr>
 		<?php
				for($i=0;$i<$rows;$i++)

				{
					$a=mysqli_fetch_assoc($catalog);
					$b=mysqli_fetch_assoc($request);
		?>
 		<tr class="table"><td align="center"><img class="foto_brick" src="IMG/<?php echo $a['Picture'] ?>"/></td>
 			<td align="center"><?php echo $a['Brick']; ?> кирпич</td>
 			<td align="center"><?php echo $a['PriceThing']; ?></td>
 			<td align="center"><b id="cena_<?php echo $i+1; ?>"><?php echo $a['PriceM2']; ?></b></td>
 				
 			<td align="center">
 				<b onclick="plus(<?php echo $i+1; ?>)">[+]</b> 
 				<b id="col_<?php echo $i+1; ?>"> 
 					<?php 
 					$col=$b['number'];
 					echo ($col);
 					?>
 					</b> шт. 
 				<b onclick="minus(<?php echo $i+1; ?>)">[-]</b>
 				
 			</td>
 			<td align="center">
 				<b id="cenap_<?php echo $i+1; ?>">
 				<?php 
 					if($a['ID']==$b['id_brick'])
 					{
 						$c=$b['number']*$a['PriceM2'];
 						$d+=$c;
 						echo $c;
 					}  
 					else
 					{
 						echo 0;
 					}
 					?>
 				</b> руб.
 			</td>
 		</tr>
 		<?php
		}
		?>
 			
 	</table>
 	<p>ИТОГО:<b id="itog"><?php echo $d; ?> </b> руб.</p>
 	<form action="request.php" method="post" name="form_register">
		<input type="submit" name="send_request" value="Подтвердить заказ">
	</form>

 </body>

 <footer>
	<?php
    require_once("footer.php");
	?>
</footer>
