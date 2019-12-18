<?php
session_start();
require_once('connection.php');

$ip=$_SESSION['ip'];
$login=$_SESSION['login'];
$date = date('Y-m-d');

$cart=mysqli_query($connection, "SELECT * FROM `basket` WHERE ip='$ip' and user='$login'"); 
$catalog=mysqli_query($connection, "SELECT * FROM `catalog`");
$user_req=mysqli_query($connection, "SELECT * FROM `users` WHERE Login='$login'");
$number_positions=mysqli_num_rows($cart);
$user_ar=mysqli_fetch_assoc($user_req);
$user=$user_ar['ID'];
$orderid=1;
//$addorder=mysqli_query ($connection, "INSERT INTO `orders` (`id`, `userID`) VALUES (NULL, '".$user."');");


//$order=mysqli_fetch_assoc($orderlast);
//$orderid=$order['id'];
for ($j;$j<$number_positions;$j++)
{
	$as_ar=mysqli_fetch_assoc($cart);	
	$a=mysqli_fetch_assoc($catalog);
		if ($as_ar['number']!=0) 
	{
		$amount=$as_ar['number'];		
		$brick=$as_ar['brick'];
		$total=$as_ar['number']*$a['PriceM2'];
		$addingToOrder=mysqli_query ($connection, "INSERT INTO `orderbrick` (`UserID`,`OrderID` ,`Brick` , `number`, `Date`, `TotalPrice`) VALUES ('".$user."', ".$orderid."','".$brick."',  '".$amount."', '".$date."', '".$total."');");		
	}

	
}


$delete=mysqli_query ($connection, "DELETE FROM `basket`"); 

//echo "Ваш заказ успешно отправлен";
//echo "Вы автоматически перейдете на главную страницу через 10 секунд или нажмите на ссылку <a href='index.php'>Главная страница</a>";
echo "Ваш заказ успешно отправлен <br>
Вы автоматически перейдете на главную страницу через 10 секунд или нажмите на ссылку <a href='index.php'>Главная страница</a>";
echo "<script>setTimeout(\"Location: ".$address_site."/index.php;\",3);</script>";
?>