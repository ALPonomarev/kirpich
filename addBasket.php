<?php
session_start();
?>
<?php
require_once('connection.php');
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
$test_basket_empty=mysqli_query($connection, "SELECT * FROM `basket` WHERE ip='$ip' and user='$login' ");
$result_test=mysqli_num_rows($test_basket_empty);
if(empty($result_test)||$result_test==0){
$query=mysqli_query($connection, "SELECT * FROM `catalog`"); 
$rows=mysqli_num_rows($query);
for($i;$i<$rows;$i++)
{
	$find=mysqli_fetch_assoc($query);
	if (isset($_POST[$find['ID']])) 		
	{
		$addnumber=$_POST[$find['ID']];
		if (empty($addnumber)){
			$addnumber=0;
		}
		$_SESSION[$find['ID']]=$_POST[$find['ID']];
		$id_brick=$find['ID'];		
		$_SESSION['ip']=$ip;
		$addbrickid=$find['Brick'];
		$adduser=$_SESSION['login'];
		$resultadd=mysqli_query ($connection, "INSERT INTO `basket` (`id`, `user`,`ip`,`id_brick`,`brick`,`number`) VALUES(NULL,'".$adduser."','".$ip."','".$id_brick."' ,'".$addbrickid."', '".$addnumber."')");//		
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: ".$address_site."/basket.php");		
	}
}
}
header("Location: ".$address_site."/basket.php");
?>