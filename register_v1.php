<?php
    //Запускаем сессию
    session_start();

    //Добавляем файл подключения к БД
    require_once("connection.php");

    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';

    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка зарегистрироваться. Если да, то идём дальше, если нет, значит пользователь зашёл на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */
    if(isset($_POST["btn_submit_register"]) && !empty($_POST["btn_submit_register"]))
    {

        
            
            /* Проверяем если в глобальном массиве $_POST существуют данные отправленные из формы и заключаем переданные данные в обычные переменные.*/

            
            if(isset($_POST["FirstName"]))
            {
                
                //Обрезаем пробелы с начала и с конца строки
                $FirstName = trim($_POST["FirstName"]);

                //Проверяем переменную на пустоту
                if(!empty($FirstName))
                {
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $FirstName = htmlspecialchars($FirstName, ENT_QUOTES);
                }
                else
                {
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error'>Укажите Ваше имя</p>";

                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем скрипт
                    exit();
                }   
            }
            else
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error'>Отсутствует поле с именем</p>";

                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем скрипт
                exit();
            }

            
            if(isset($_POST["SecondName"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $SecondName = trim($_POST["SecondName"]);

                if(!empty($SecondName))
                {
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $SecondName = htmlspecialchars($SecondName, ENT_QUOTES);
                }
                else
                {

                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Вашу фамилию</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }                
            }
            else
            {

                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле с фамилией</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            
            if(isset($_POST["email"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $email = trim($_POST["email"]);

                if(!empty($email))
                {


                    $email = htmlspecialchars($email, ENT_QUOTES);

                    // (3) Место кода для проверки формата почтового адреса и его уникальности

                    //Проверяем формат полученного почтового адреса с помощью регулярного выражения
                    $reg_email = "/^[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z]+/i";

                    //Если формат полученного почтового адреса не соответствует регулярному выражению
                    if( !preg_match($reg_email, $email))
                    {
                        // Сохраняем в сессию сообщение об ошибке. 
                        $_SESSION["error_messages"] .= "<p class='mesage_error' >Вы ввели неправельный email</p>";
                        
                        //Возвращаем пользователя на страницу регистрации
                        header("HTTP/1.1 301 Moved Permanently");
                        header("Location: ".$address_site."/form_register.php");

                        //Останавливаем  скрипт
                        exit();
                    }

                    //Проверяем нет ли уже такого адреса в БД.
                    $result_query = $mysqli->query("SELECT `EMail` FROM `userdata` WHERE `EMail`='".$email."'");
                    
                    //Если кол-во полученных строк ровно единице, значит пользователь с таким почтовым адресом уже зарегистрирован
                    if($result_query->num_rows == 1)
                    {

                        //Если полученный результат не равен false
                        if(($row = $result_query->fetch_assoc()) != false)
                        {
                            
                                // Сохраняем в сессию сообщение об ошибке. 
                                $_SESSION["error_messages"] .= "<p class='mesage_error' >Пользователь с таким почтовым адресом уже зарегистрирован</p>";
                                
                                //Возвращаем пользователя на страницу регистрации
                                header("HTTP/1.1 301 Moved Permanently");
                                header("Location: ".$address_site."/form_register.php");
                            
                        }
                        else
                        {
                            // Сохраняем в сессию сообщение об ошибке. 
                            $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка в запросе к БД</p>";
                            
                            //Возвращаем пользователя на страницу регистрации
                            header("HTTP/1.1 301 Moved Permanently");
                            header("Location: ".$address_site."/form_register.php");
                        }

                        /* закрытие выборки */
                        $result_query->close();

                        //Останавливаем  скрипт
                        exit();
                    }

                    /* закрытие выборки */
                    $result_query->close();
                }
                else
                {
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш email</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }
            }
            else
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода Email</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            if(isset($_POST["login"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $login = trim($_POST["login"]);

                if(!empty($login))
                {
                    // Для безопасности, преобразуем специальные символы в HTML-сущности
                    $login = htmlspecialchars($login, ENT_QUOTES);
                }
                else
                {

                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш Login</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }                
            }
            else
            {

                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле с Login</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }



            if(isset($_POST["password"]))
            {

                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);

                if(!empty($password))
                {
                    $password = htmlspecialchars($password, ENT_QUOTES);

                    //Шифруем папроль
                    $password = md5($password."top_secret"); 
                }
                else
                {
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Укажите Ваш пароль</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/form_register.php");

                    //Останавливаем  скрипт
                    exit();
                }
            }
            else
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }

            // (4) Место для кода добавления пользователя в БД

            //Запрос на добавления пользователя в БД
            $result_query_insert = $mysqli->query("INSERT INTO `userdata` (FirstName, SecondName, email) VALUES ('".$FirstName."', '".$SecondName."', '".$email."')");

            /*$result_query_insert = $mysqli->query("INSERT INTO `users` (login, password) VALUES ('".$login."', '".$password."')");*/



            if(!$result_query_insert)
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на добавления пользователя в БД</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_register.php");

                //Останавливаем  скрипт
                exit();
            }
            else
            {

                $_SESSION["success_messages"] = "<p class='success_message'>Регистрация прошла успешно!!! <br />Теперь Вы можете авторизоваться используя Ваш логин и пароль.</p>";

                //Отправляем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/form_auth.php");
            }

            /* Завершение запроса */
            $result_query_insert->close();

            //Закрываем подключение к БД
            $mysqli->close();
    }
    else
    {

        exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    }
?>
    

    


    <!--/*
    if(isset($r_send)){
        // Формируем запрос к БД для ввода данных
        $query = " INSERT INTO users (name,username,password) VALUES ('$r_name','$r_username','$r_password')";

        $result = mysql_query($query) or die ( "Error : ".mysql_error() );
 
        // Если все нормально то выводим сообщение.
        if($result){
            echo 'Регистрация прошла успешно! <a href="index.php">Перейти на главную страницу.</a> ';
            exit();
        }
    }else{
        echo 'Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href="index.php"> главную страницу </a>';
    }*/
