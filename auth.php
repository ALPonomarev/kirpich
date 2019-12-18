<?php
    session_start();
    require_once("connection.php");
    //Объявляем ячейку для добавления ошибок, которые могут возникнуть при обработке формы.
    $_SESSION["error_messages"] = '';

    //Объявляем ячейку для добавления успешных сообщений
    $_SESSION["success_messages"] = '';


    /*
        Проверяем была ли отправлена форма, то есть была ли нажата кнопка Войти. Если да, то идём дальше, если нет, значит пользователь зашел на эту страницу напрямую. В этом случае выводим ему сообщение об ошибке.
    */
    //if(isset($_POST["button_auth"]) && !empty($_POST["button_auth"]))
    //{

        //обработка Логина
        //Обрезаем пробелы с начала и с конца строки
            $login = trim($_POST["login"]);
            if(isset($_POST["login"]))
            {
                if(!empty($login))
                {
                    $login = htmlspecialchars($login, ENT_QUOTES);
                }

                else
                {
                    // Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Поле для ввода Логина не должна быть пустым.</p>";
                    
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
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода Логина</p>";
                
                //Возвращаем пользователя на страницу авторизации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/index.php");

                //Останавливаем скрипт
                exit();
            }

             //Обработка пароля
            if(isset($_POST["password"])){

                //Обрезаем пробелы с начала и с конца строки
                $password = trim($_POST["password"]);
            }
            else
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Отсутствует поле для ввода пароля</p>";
                
                //Возвращаем пользователя на заглавную страницу
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/index.php");

                //Останавливаем скрипт
                exit();
            }

            // Запрос к БД
            //Запрос в БД на выборке пользователя.
            $result_query_select = mysqli_query($connection, "SELECT * FROM `users` WHERE Login = '".$login."' AND Password = '".$password."'");

            if(!$result_query_select)
            {
                // Сохраняем в сессию сообщение об ошибке. 
                $_SESSION["error_messages"] .= "<p class='mesage_error' >Ошибка запроса на выборке пользователя из БД</p>";
                
                //Возвращаем пользователя на страницу регистрации
                header("HTTP/1.1 301 Moved Permanently");
                header("Location: ".$address_site."/index.php");

                //Останавливаем скрипт
                exit();
            }
            else
            {

                //Проверяем, если в базе нет пользователя с такими данными, то выводим сообщение об ошибке
                if($result_query_select->num_rows == 1)
                {
                    
                    // Если введенные данные совпадают с данными из базы, то сохраняем логин и пароль в массив сессий.
                    $_SESSION['login'] = $login;
                    $_SESSION['password'] = $password;

                    //Возвращаем пользователя на главную страницу
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");

                }
                else
                {// Сохраняем в сессию сообщение об ошибке. 
                    $_SESSION["error_messages"] .= "<p class='mesage_error' >Неправильный логин и/или пароль</p>";
                    
                    //Возвращаем пользователя на страницу регистрации
                    header("HTTP/1.1 301 Moved Permanently");
                    header("Location: ".$address_site."/index.php");

                    //Останавливаем скрипт
                    exit();
                }
            }
   // }
    //else
    //{
    //    exit("<p><strong>Ошибка!</strong> Вы зашли на эту страницу напрямую, поэтому нет данных для обработки. Вы можете перейти на <a href=".$address_site."> главную страницу </a>.</p>");
    //}