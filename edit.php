<?php
include_once 'connection.php';
session_start();
if(!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('location:index.php');
}
if(!isset($_GET['post_id'])) {
    header('location:profile.php');
}
$id = $_GET['post_id'];
$query = mysql_query("SELECT * FROM post WHERE post_id='$id'");
$post = mysql_fetch_object($query);
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

<div id="form"></div>
<form action="editpost.php" method="POST">
    <input type="hidden" name="post_id" value="<?php echo $id; ?>";/>
    <ul class="form-style-1">
        <li>
            <label>Title </label>
            <input type="text" name="title" class="field-long" value="<?php echo $post->title; ?>"/>
        </li>
        <li>
            <label>Category</label>
            <select name="category" class="field-select" id='category' required>
                <option value="">Product Category</option>
                <option value="bag">Bag</option>
                <option value="accesories">Accessories</option>
                <option value="batik">Kain Batik</option>
                <option value="batik weare">Batik weare</option>
                <option value="handycraft">Handycraft</option>
                <option value="gerabah">Gerabah</option>
            </select>
        </li>
        <script type="text/javascript">
             $('#category').val(<?php echo "\"" . $post->category . "\""; ?>);
        </script>
        <li>
            <label>Description </label>
            <textarea name="description" id="field5" class="field-long field-textarea"><?php echo $post->description; ?></textarea>
        </li>
        <li>
            <label>Price </label>
            <input type="text" name="price" class="field-long" value="<?php echo $post->price; ?>"/>
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
