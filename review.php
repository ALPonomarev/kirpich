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
		require_once('connection.php');
		$query=mysqli_query($connection, "SELECT * FROM `review`ORDER BY `date` DESC");
		$rows=mysqli_num_rows($query);
		?>
	</head>
	<body>
		<?php require_once("header.php");?>
		<form action="review_add.php" method="post" name="review">
		<input type="submit" name="add_review" value="Добавить свой отзыв">


		<?php
		for ($i;$i<$rows;$i++)
			{
				$feedback=mysqli_fetch_assoc($query);?>

			<div class="old_feedback">
				<p>-----------------------------------------------------------</p>
				<h3 class="login_author"><?php echo $feedback['Login'];?></h3>
				<h3 class="login_author"><?php echo $feedback['date'];?></h3>
				<textarea id="window_rev" rows="10" cols="120" readonly="">
					<?php echo $feedback['feedback'];?>
				
				</textarea>
				<!--<h4 class="text_feedback"><?php echo $feedback['feedback'];?></h4>-->
			<?php } ?>
			</div>
		</form>

	</body>
	<footer>
	<?php
    require_once("footer.php");
	?>
	</footer>