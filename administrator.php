<?php
session_start();
?>
<!DOCTYPE html>

<head>
	<title>Гипсовый кирпич в Новосибирске</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="normalize.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<meta charset="utf-8">	
</head>

<body>
	<?php
	    //Подключение шапки
	    require_once('header.php');
	    require_once('connection.php');
	    $orders=mysqli_query($connection, "SELECT * FROM `orderbrick`");
		$rows=mysqli_num_rows($orders);
		$a=mysqli_fetch_assoc($orders);
	?>

	<table id="order" align="center" bordercolor="black" border="2">
		<tr>
			<td>User</td>
			<td>USER ID (Кирпич)</td>
			<td>STATUS (Количество)</td>
			<!--<td>Цена</td>
			<td>Дата заказа</td>-->
		</tr>
		<?php
		 
		 for($i;$i<$rows;$i++)
		 	{
				
		?>
		<tr>
			<td><?php echo $a['id'];?></td>
			<td><?php echo $a['userID'];?></td>
			<td><?php echo $a['status'];?></td>
		</tr>

	<?php } ?>

		
	</table>





</body>
</html>