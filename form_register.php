<?php
session_start();
?>

<!DOCTYPE html>
  <html>
    <head>
        <title>Регистрация в магазине</title>
          <?php require_once('connection.php');?>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="normalize.css" rel="stylesheet">
          <link href="style.css" rel="stylesheet">
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
          <meta charset="utf-8">
        
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script src="form_register.js"></script>
    </head>

   <body>
    <?php require_once("header.php");?>
    <div id="form_register">
      <h2>Форма регистрации</h2>
 
            <form action="register.php" method="post" name="form_register">
                <table>

                <select name="choose" id="choose" class="input-select">
                  <option value="nul" selected disabled>Выберите форму</option>
                  <option value="fizik">Физ лицо</option>
                  <option value="urface">Компания</option>    
                </select>

            </br></br>
               
              
                
            
            <section class="jqueryOptions fizik">
                
                <div class="regform">
                    <tr class="jqueryOptions fizik">
                        <td> Имя: </td>
                        <td>
                            <input type="firstname" maxlength="15" name="firstname" >
                        </td>
                    </tr>

                    <tr class="jqueryOptions fizik">
                        <td> Отчество: </td>
                        <td>
                            <input type="middlename" maxlength="20" name="middlename" >
                        </td>
                    </tr>

                
                    <tr class="jqueryOptions fizik">
                        <td> Фамилия: </td>
                        <td>
                            <input type="secondname" maxlength="15" name="secondname" >
                        </td>
                    </tr>                                
                </div>
            </section>


            <section class="jqueryOptions urface">

                <div class="regform">
                    <tr class="jqueryOptions urface">
                        <td> Правовая форма: </td>
                        <td>
                            <input type="ownership" size="3" maxlength="3" name="ownership" >
                        </td>
                    </tr>

                    <tr class="jqueryOptions urface">
                        <td> Название компании: </td>
                        <td>
                            <input type="namecompany" maxlength="20" name="namecompany" >
                        </td>
                    </tr>

                
                    <tr class="jqueryOptions urface">
                        <td> ИНН: </td>
                        <td>
                            <input type="inn" maxlength="18" name="inn" >
                        </td>
                    </tr>  

                    <tr class="jqueryOptions urface">
                        <td> КПП: </td>
                        <td>
                            <input type="kpp" maxlength="9" name="kpp" >
                        </td>
                    </tr>

                    <tr class="jqueryOptions urface">
                        <td> Расчетный счет: </td>
                        <td>
                            <input type="invoice" maxlength="20" name="invoice" >
                        </td>
                    </tr>
                </div>
            </section>

                    <tr>
                        <td> Email: </td>
                        <td>
                            <input type="email" name="email" maxlength="35" required="required"><br>
                            <span id="valid_email_message" class="mesage_error"></span>
                        </td>
                    </tr>                                 


                    <tr>
                        <td> Телефон: </td>
                        <td>
                            <input type="tel" maxlength="11" name="tel" required="required"><br>
                            
                        </td>
                    </tr>

                    <tr>
                        <td> Логин: </td>
                        <td>
                            <input type="login" name="login" maxlength="15" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>

                    <tr>
                        <td> Пароль: </td>
                        <td>
                            <input type="password" name="password" minlength="6" placeholder="минимум 6 символов" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="btn_submit_register" value="Зарегистрироватся!">
                        </td>
                    </tr>
                
              </table>
            </form>
        </div>
    </body>
<footer>
    <?php require_once("footer.php");?>
</footer>
        
</html>

