<?php
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
    <link rel="stylesheet" type="text/css" href="css/banner.css">
    <link rel="stylesheet" type="text/css" href="css/posting.css">
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

<div id="form"></div>
<form action="post-core.php" method="POST" enctype="multipart/form-data">
    <ul class="form-style-1">
        <li>
            <label>Title </label>
            <input type="text" name="title" class="field-long" required/>
        </li>
        <li>
            <label>Category</label>
            <select name="category" class="field-select" required>
                <option value="">Product Category</option>
                <option value="bag">Bag</option>
                <option value="accesories">Accessories</option>
                <option value="batik">Kain Batik</option>
                <option value="batik weare">Batik weare</option>
                <option value="handycraft">Handycraft</option>
                <option value="gerabah">Gerabah</option>
            </select>
        </li>
        <li>
            <label>Description </label>
            <textarea name="description" id="field5" class="field-long field-textarea" required></textarea>
        </li>
        <li>
            <label>Price </label>
            <input type="text" name="price" class="field-long" required/>
        </li>
        <li>
            <label>Upload a Picture</label>
            <input type="file" size="20" id="imageUpload" name="img">
        </li>
        <li>
            <input type="submit" value="Submit"/>
        </li>
    </ul>
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