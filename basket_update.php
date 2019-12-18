<?php
session_start();
require_once('connection.php');
if (isset($_POST['num'])) $num = ($_POST['num']);
if (isset($_POST['id'])) $id = ($_POST['id']);
$query_test=mysqli_query($connection, "SELECT id_brick FROM `basket` WHERE id_brick='$id'" );
$query_emp=mysqli_num_rows($query_test);
if (!empty($query_emp)){
$upd=mysqli_query($connection, "UPDATE `basket` SET number='$num' WHERE id_brick='$id'");
}
else{
$add=mysqli_query($connection, "INSERT INTO `basket` (`id`, `user`,`ip`,`id_brick`,`brick`,`number`) VALUES(NULL,'".$adduser."','".$_SESSION['ip']."','".$id."' ,'".$addbrickid."', '".$num."')");
}
?>