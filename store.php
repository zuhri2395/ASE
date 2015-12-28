<?php
include_once 'connection.php';
session_start();
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
    <link rel="stylesheet" type="text/css" href="css/store.css">
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
<?php
if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
?>
<nav>
    <ul>
        <li id="login">
            <a id="login-trigger" href="#">
                Log in <span></span>
            </a>
            <div id="login-content">
                <form action="login.php" method="POST">
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
            <a href="register.html">Sign up</a>
        </li>
    </ul>
</nav>
<?php
} else {
?>
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
<?php
}
?>
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
<div class="content">
<?php
    $sql = mysql_query("SELECT * FROM shops");
    while($row = mysql_fetch_object($sql)) {
        $query = mysql_query("SELECT picture FROM member WHERE username='$row->username'");
        $pic = mysql_fetch_object($query)->picture;
        echo "<div class='boxStore'>";
        echo "<ul>";
        echo "<div class='photoProf' style='background-image:url(profile/$pic);'></div>";
        echo "<li class='userName'>$row->name</li>";
        echo "<ul class='infoI'>";
        echo "<li><h4>$row->location</h4></li>";
        echo "</ul>";
        echo "<ul class='infoII'>";
        echo "<li><h4>$row->phone</h4></li>";
        echo "</ul>";
        echo "</div>";
    }
?>
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