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
    <link rel="stylesheet" type="text/css" href="css/post.css">
    <link rel="stylesheet" type="text/css" href="css/posting.css">
    <link rel="stylesheet" type="text/css" href="css/profile.css">
    <link rel="stylesheet" type="text/css" href="css/storeInside.css">
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#form-search').submit(function(event) {
                event.preventDefault();
            });

            $('#search').click(function() {
                var query = $('#keyword').val();
                $(location).attr('href', "Search/" + query);
            });
        });
    </script>
</head>
<body>

<!-- login special -->
<nav>
    <ul>
        <li id="login">
            <a id="login-trigger" href="#">
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="store.php">Stores</a></li>
        <li><a href="#">Help</a></li>
        <li>
            <form id="form-search">
                <div class="searchE">
                    <input class="left" type='text' id="keyword" placeholder="Search">
                    <input class='lupLogo left' type='submit' id="search" value="">
                </div>
            </form>
        </li>
    </ul>
</div>

<form action="editProf.php" method="POST" class="basic-grey">
    <h1>Edit Profile </h1>
    <label>
        <span>Your Username :</span>
        <input id="username" type="text" name="username" value="<?php echo $user; ?>" disabled/>
    </label>

    <label>
        <span>Your Email :</span>
        <input id="prof-email" type="email" name="profile-email" placeholder="Valid Email Address" value="<?php echo $profile->email; ?>" required/>
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
        <input type="submit" class="button" value="Send"/>
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