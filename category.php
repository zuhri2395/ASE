<?php
include_once 'connection.php';
session_start();

$category = strtolower(mysql_real_escape_string($_GET['category']));

?>
<!DOCTYPE html>
<html>
<head>
    <title>Langgeng Home </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
            });

            $('#form-search').submit(function(event) {
                event.preventDefault();
            });

            $('#search').click(function() {
                var query = $('#keyword').val();
                $(location).attr('href', "../Search/" + query);
            });
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
        <li><a href="../index.php">Home</a></li>
        <li><a href="../about.html">About</a></li>
        <li><a href="../store.php">Stores</a></li>
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

<div id="content">
<?php
    $query = mysql_query("SELECT * FROM post WHERE category='$category'");
    echo "<h1>" . strtoupper($category) . "</h1>";
    while($row = mysql_fetch_object($query)) {
        $sql = mysql_query("SELECT * FROM shops WHERE shop_id='$row->shop_id'");
        $shop = mysql_fetch_object($sql);
        echo "<div class='inSale'>";
        echo "<div class='insideSale'>";
        echo "<img class='goods' src='store/$row->pictures' width='150' height='150'>";
        echo "<h2>$row->title</h2>";
        echo "<p class='descriptionp'>$row->description</p>";
        echo "<div class='price'><h2>$row->price</h2></div>";
        echo "<ul class='infoI'>";
        echo "<li><h3>$shop->location</h3></li>";
        echo "</ul>";
        echo "<ul class='infoII'>";
        echo "<li><h3>$shop->phone</h3></li>";
        echo "</ul>";
        echo "</div>";
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