<?php
include_once 'connection.php';
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location:index.php');
}
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
    <link rel="stylesheet" type="text/css" href="css/banner.css">
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

<form action="shop.php" method="POST" class="basic-grey">
    <h1>Open Shop </h1>
    <label>
        <span>Store's name :</span>
        <input id="name" type="text" name="name" placeholder="Your Store Name"/>
    </label>

    <label>
        <span>Location :</span>
        <input type="text" name="location" placeholder="Store Location"/>
    </label>

    <label>
        <span>Phone Number :</span>
        <input type="text" name="phone" placeholder="Store Phone Number"/>
    </label>

    <label>
        <span>&nbsp;</span>
        <input type="submit" class="button" value="Send"/>
    </label>

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
</form>

</body>
</html>