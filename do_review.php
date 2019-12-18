<?php
session_start();
?>
<?php
if (isset($_POST['review_add']))
    { $review_add = $_POST['review_add']; }
require_once('connection.php');
$login=$_SESSION['login'];
$add = mysqli_query ($connection, "INSERT INTO `review`(`Login`,`feedback`) VALUES ('".$login."', '".$review_add."')");
//проверка
if ($add=='TRUE')
 {
    echo "Отзыв добавлен. <a href='index.php'>Главная страница</a>";
 }
 else
 {
 	"Ошибка! Не удалось добавить отзыв. <a href='review_add.php'>Cтраница ввода отзыва</a>";
 }
?>
