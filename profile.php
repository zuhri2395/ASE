<?php
include_once 'connection.php';
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
            <a id="login-trigger" href="profile.php">
                <?php echo $_SESSION['username']; ?><span></span>
            </a>
        </li>
        <li id="signup">
            <a href="logout.php">Sign out</a>
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

<div id="content">
    <div class="profile">
        <ul>
            <div class="photoProf" style="background-image:url('profile/<?php echo $profile->picture; ?>');"></div>
            <li class="userName"><?php echo $profile->username; ?></li>
            <li class="description"><span style="color:#ffbc14;font-size:1.3em;">&ldquo;</span><?php echo $profile->about; ?><span
                        style="color:#ffbc14;font-size:1.3em;">&bdquo;</span></li>
        </ul>
        <a href="editProfile.php">
            <div class="buttonPro">Edit Profile</div>
        </a>
        <a href="#">
            <div class="buttonOpe">Open Business</div>
        </a>
    </div>
</div>

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