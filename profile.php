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
        <?php
            $sql = mysql_query("SELECT COUNT(*) AS exist FROM shops WHERE username='$user'");
            $exist = mysql_fetch_object($sql)->exist;
            $shop;
            if($exist) {
                echo "<a href='post.php'>";
                echo "<div class='buttonOpe'>Add Post</div>";
                echo "</a>";
            } else {
                echo "<a href='openShop.php'>";
                echo "<div class='buttonOpe'>Open Business</div>";
                echo "</a>";
            }
        ?>
    </div>
</div>
<?php
if($exist) {
    $shop = mysql_fetch_object(mysql_query("SELECT * FROM shops WHERE username='$user'"));
    $sql = mysql_query("SELECT COUNT(*) as exist FROM post WHERE shop_id='$shop->shop_id'");
    $postExist = mysql_fetch_object($sql)->exist;
    echo "<h1>$shop->name</h1>";
    if($postExist) {
        $query = mysql_query("SELECT * FROM post WHERE shop_id='$shop->shop_id'");
        while($row = mysql_fetch_object($query)) {
            echo "<div class='inSale'>";
            echo "<a href='delPost.php?post_id=$row->post_id'>";
            echo "<div class='delPost'>Delete</div>";
            echo "</a>";
            echo "<a href='edit.php?post_id=$row->post_id'>";
            echo "<div class='editPost'>Edit</div>";
            echo "</a>";
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
    }
}
?>
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