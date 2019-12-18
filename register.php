<?php
    if (isset($_POST['login']) && !empty($_POST['login']))
    { $login = $_POST['login']; }
    if (isset($_POST['password']) && !empty($_POST['password']))
    {$password = $_POST['password'];}
     
    if (isset($_POST['firstname'])) { $firstname = $_POST['firstname'];}
    if (empty($firstname)) {$firstname='';}
    if (isset($_POST['middlename'])) { $middlename=$_POST['middlename'];}
    if (empty($middlename)) {$middlename='';}
    if (isset($_POST['secondname'])) { $secondname=$_POST['secondname'];}
    if (empty($secondname)) {$secondname='';}
    if (isset($_POST['ownership'])) { $ownership=$_POST['ownership'];}
    if (empty($ownership)) {$ownership='';}
    if (isset($_POST['namecompany'])) { $namecompany=$_POST['namecompany'];}
    if (empty($namecompany)) {$namecompany='';}
    if (isset($_POST['inn'])) { $inn=$_POST['inn'];}
    if (empty($inn)) {$inn=0;}
    if (isset($_POST['kpp'])) { $kpp=$_POST['kpp'];}
    if (empty($kpp)) {$kpp=0;}
    if (isset($_POST['invoice'])) { $invoice=$_POST['invoice'];}
    if (empty($invoice)) {$invoice=0;}
    if (isset($_POST['email']))  {$email=$_POST['email'];}
    if (empty($email)) {$email='';}
    if (isset($_POST['tel'])) { $tel=$_POST['tel'];}
    if (empty($tel)) {$tel='';}
    
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }



    //обрабатываем введеные значения: убираем лишние символы и пробелы
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $firstname = stripslashes($firstname);
    $firstname = htmlspecialchars($firstname);
    $middlename = stripslashes($middlename);
    $middlename = htmlspecialchars($middlename);
    $secondname = stripslashes($secondname);
    $secondname = htmlspecialchars($secondname); 
    $ownership = stripslashes($ownership);
    $ownership = htmlspecialchars($ownership);
    $namecompany = stripslashes($namecompany);
    $namecompany = htmlspecialchars($namecompany);
    $inn = stripslashes($inn);
    $inn = htmlspecialchars($inn);
    $kpp = stripslashes($kpp);
    $kpp = htmlspecialchars($kpp);
    $invoice = stripslashes($invoice);
    $invoice = htmlspecialchars($invoice);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $tel = stripslashes($tel);
    $tel = htmlspecialchars($tel);

 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
    $firstname = trim($firstname);
    $middlename = trim($middlename);
    $secondname = trim($secondname);
    $ownership = trim($ownership);
    $inn = trim($inn);
    $kpp = trim($kpp);
    $invoice = trim($invoice);
    $email = trim($email);
    $tel = trim($tel);
    
    $date = date('Y-m-d');
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

 // подключаемся к базе
  //  include ("connection.php");
    require_once('connection.php');
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query ($connection, "SELECT ID FROM users WHERE Login='$login'");
    $myrow = mysqli_fetch_array($result);
    
    if (!empty($myrow['ID'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин. <a href='form_register.php'>Cтраница регистрации</a> ");    
    }
 // если такого нет, то сохраняем данные

    $result2 = mysqli_query ($connection, "INSERT INTO `users` (`ID`, `Login`, `Password`, `Type`, `Status`) VALUES(NULL,'$login','$password', '', '')");
    
    $result3 = mysqli_query  ($connection, "INSERT INTO `userdata` (`ID`, `Login`, `Ownership`, `SecondName`, `FirstName`, `MiddleName`, `NameCompany`, `INN`, `KPP`, `Invoice`, `Tel`, `EMail`, `Date`, `ip`) VALUES (NULL, '".$login."', '".$ownership."', '".$secondname."', '".$firstname."', '".$middlename."', '".$namecompany."', '".$inn."', '".$kpp."', '".$invoice."', '".$tel."', '".$email."', '".$date."', '".$ip."')" );

    // Проверяем, есть ли ошибки

    if ($result2=='TRUE' && $result3=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
    }
 else {
    
    echo "Ошибка! Вы не зарегистрированы. <a href='form_register.php'>Cтраница регистрации</a>";
    
    }
    ?>