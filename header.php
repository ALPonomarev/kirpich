<!doctype html>
<html lang="en">

<head>

	<title>Гипсовый кирпич в Новосибирске</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="normalize.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="form_register.js"></script>
	
</head>

<header>
		
		<div class="header">
			<a class="logo" href="index.php">
				<img class="mylog" src="IMG/LogoSmallTit.jpg">
			</a>
			<ul class="menu">
				<li><a class="linkhed" href="about.php">О Нас</a></li>
				<!-- <li><a class="linkhed" href="news.html">Новинки</a></li> -->
				<li><a class="linkhed" href="price.php"> <!-- Убираем эконку доллара <i class="fas fa-dollar-sign"></i>-->Стоимость</a></li>
				<li><a class="linkhed" href="review.php">Отзывы</a></li>
				<?php
				if(isset($_SESSION['login']) && isset($_SESSION['password']) && $_SESSION['login']=='lex' ){
					?>
				<li><a class="linkhed" href="administrator.php">админка</a></li>
				<?php
				}
				?>
				<?php
				if(isset($_SESSION['login']) && isset($_SESSION['password'])){
					?>
				<li><a class="linkhed" href="basket.php"><i class="fas fa-shopping-cart"></i>  Корзина</a></li>
				<?php
				}
				?>
			</ul>
			
			<div>
				<?php
				//Проверяем авторизацию пользователя
   				if(!isset($_SESSION['login']) && !isset($_SESSION['password'])){
        		// если нет, то выводим блок с ссылками на страницу регистрации и авторизации
				?>				
				<div id="regform">
					<!--<a class="reg" href="form_register.php">Регистрация</a>-->
					<!-- Модальное всплывающее окно Регистрации через Bootstrap -->
					
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >
					  Регистрация
					</button>


					<!-- Modal -->
					 <form action="register.php" method="post" name="form_register">
					<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLabel">Регистрация</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <table>
<!-- убираем селектор между физиками и юриками
                <select name="chooseR" id="chooseR" class="input-select">
                  <option value="nul" selected disabled>Выберите форму</option>
                  <option value="fizik">Физ лицо</option>
                  <option value="urface">Компания</option>    
                </select>

            </br></br> -->               
              
                
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

<!-- Убираем возможность регистрации как юр лица
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
-->
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
                            <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
                            <span id="valid_password_message" class="mesage_error"></span>
                        </td>
                    </tr>
                    
              </table>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <input type="submit" class="btn btn-primary" value="Зарегистрироваться">
					      </div>
					    </div>
					  </div>
					</div>
					</form>



		           <!-- <a class="reg" href="form_auth.php">Авторизация</a>	-->
		            <!-- Модальное всплывающее окно авторизации через Bootstrap  -->
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  Авторизация
					</button>

					<!-- Modal -->
					<form action="auth.php" method="post" name="form_auth">
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
						        	
						        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          			<span aria-hidden="true">&times;</span>
						        		</button>
						      </div>
						      <div class="modal-body">
						        <table>
						          
						            <tbody>
						            	<tr>
						                    <td> Логин: </td>
						                    <td>
						                        <input type="login" name="login" required="required"><br>
						                        <span id="valid_login_message" class="mesage_error"></span>
						                    </td>
						                </tr>
						          
						                <tr>
						                    <td> Пароль: </td>
						                    <td>
						                        <input type="password" name="password" placeholder="минимум 6 символов" required="required"><br>
						                        <span id="valid_password_message" class="mesage_error"></span>
						                    </td>
						                </tr>                               
						            </tbody>
						        </table>
						        
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						        <input type="submit" class="btn btn-primary" value="Войти">
						      </div>
						    </div>
						  </div>
						</div>
					</form>
				</div>

				<?php
			    }
			    else
			    {
			        //Если пользователь авторизован, то выводим ссылку Выход
				?> 
       			<div id="link_logout">
       				<p><?php echo ($_SESSION['login']);?>, рады Вас видеть на нашем сайте <br></p>
            	<a href="logout.php">Выход</a>
        		</div>
				<?php
				    }				    
				?>
	          

	 		<p class="tel"><i class="fas fa-mobile-alt"></i>   8 999 305 58 25</p>
	                
	 
	        </div>
	    </div>		
</header>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


