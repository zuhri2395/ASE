<?php
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
	header('location:index.php');
}
$user = $_SESSION['username'];
$sql = mysql_query("SELECT * FROM member WHERE username='$user'");
$profile = mysql_fetch_object($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Langgeng Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="css/post.css">
    <link rel="stylesheet" type="text/css" href="css/posting.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/storeInside.css">
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
<!-- <nav>
    <ul>
        <li id="login">
            <a id="login-trigger" href="#">
                Log in <span></span>
            </a>
            <div id="login-content">
                <form>
                    <fieldset id="inputs">
                        <input id="email" type="email" name="email" placeholder="Your email address" required>
                        <input id="password" type="password" name="password" placeholder="Password" required>
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
</nav> -->
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
        <li>
            <form>
                <div class="searchE">
                    <input class="left" type='text' placeholder="Search">
                    <input class='lupLogo left' type='submit' value="">
                </div>
            </form>
        </li>
    </ul>
</div>

<form action="editPof.php" method="POST" class="basic-grey">
    <h1>Edit Profile </h1>
    <label>
        <span>Your Username :</span>
        <input id="username" type="text" name="username" value="<?php echo $user; ?>" disabled/>
    </label>

    <label>
        <span>Your Email :</span>
        <input id="prof-email" type="email" name="profile-email" placeholder="Valid Email Address" value="<? echo $profile->email; ?>" required/>
    </label>

    <label>
        <span>Password :</span>
        <input id="prof-password" type="password" name="profile-password" placeholder="Type Password" value="<?php echo $profile->password; ?>" required/>
    </label>

    <label>
        <span>About You :</span>
        <textarea class="fieldEsc" name="about"><?php echo $profile->about; ?></textarea>
    </label>

    <label>
        <span>&nbsp;</span>
        <input type="button" class="button" value="Send"/>
    </label>
</form>

<div id='footer'>
    <div class="insideFoot">
        <ul>
            <li><h3>Contact Us</h3></li>
            <li class="footText">Jl. Arjuna No. 65, Jawa Tengah 50131</li>
            <li class="footText"> Email : Sekretariat@Dinus.ac.id</li>
            <li class="footText">Fax. (024) 3569684</li>
            <li class="footText">Telp. (024) 3517261</li>
        </ul>
    </div>
</div>
</body>
</html>		