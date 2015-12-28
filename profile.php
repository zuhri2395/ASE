<!DOCTYPE html> 
	<html>
		<head>
			<title>Langgeng Home </title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" type="text/css" href="css/style.css">
			<link rel="stylesheet" type="text/css" href="css/login.css">
			<link rel="stylesheet" type="text/css" href="css/banner.css">
			<link rel="stylesheet" type="text/css" href="css/posting.css">
			<link rel="stylesheet" type="text/css" href="css/profile.css">
			<script src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#login-trigger').click(function () {
                $(this).next('#login-content').slideToggle();
                $(this).toggleClass('active');

                if ($(this).hasClass('active')) {
                    $(this).find('span').html('&#x25B2;');
                } else {
                    $(this).find('span').html('&#x25BC;');
                }
            })
        });
    </script>
		</head>
		<body>

			<!-- login special -->
			<nav>
				<ul>
			    <li id="login">
			      <a id="login-trigger" href="#">
			        Log in 
			      </a>

			      <div id="login-content">
			        <form>
			          <fieldset id="inputs">
			            <input id="email" type="email" name="email" placeholder="Your email address" required>   
			            <input id="password" type="password" name="passwprd" placeholder="Password" required>
			          </fieldset>
			          <fieldset id="actions">
			            <input type="submit" id="submit" value="Log in">
			            
			          </fieldset>
			        </form>
			      </div>                     
			    </li>
			    <li id="signup">
			      <a href="">Sign up</a>
			    </li>
			  </ul>
						</nav>
						<!-- login special -->
			<div id='head'>
				<div class='logoWrapL'></div>
				 <div class='logoWrapR'></div>
			 </div>

			<div id='navigation'>
				<ul class="menu">

					<li><a href="#">Home</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Stores</a></li>
					<li><a href="#">Help</a></li>
					<li><form>
					<div class="searchE">
						<input class="left" type='text'>
						<input class='lupLogo left' type='submit' value ="">
					</div>
				</form> </li>
				</ul>

			</div>
			<div id="content">
				<div class="profile">
					
					<ul>
						<div class="photoProf" style="background-image:url('img/profile.jpg');"></div>	  
						<li class="userName"> Polke </li>
						<li class="description"><span style="color:#ffbc14;font-size:1.3em;">&ldquo;</span>manusia setengah ikan yang suka berkelana kemana mana tanpa sandal atau pun alas kaki lainnya<span style="color:#ffbc14;font-size:1.3em;">&bdquo;</span></li>
					</ul>
					<a href="#"><div class="buttonPro">Edit Profile</div></a>
					<a href="#"><div class="buttonOpe">Open Business</div>	</a>
				</div>

			
			</div>
			<div id='footer'>
				<div class="insideFoot">
				<ul>
					<li><h3>Contact Us</h3> </li>
					<li class="footText">Jl. Arjuna No. 65, Jawa Tengah 50131</li>
					<li class="footText"> Email : Sekretariat@Dinus.ac.id</li>
					<li class="footText">Fax. (024) 3569684</li>
					<li class="footText">Telp. (024) 3517261</li>
				</ul> 
				</div>
			</div>
			
		</body>
	</html>
