<?php
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
    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jssor.slider.mini.js"></script>
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

    <script>
        jQuery(document).ready(function ($) {

            var jssor_1_SlideshowTransitions = [
                {$Duration: 1200, $Opacity: 2}
            ];

            var jssor_1_options = {
                $AutoPlay: true,
                $SlideshowOptions: {
                    $Class: $JssorSlideshowRunner$,
                    $Transitions: jssor_1_SlideshowTransitions,
                    $TransitionsOrder: 1
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
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

<div id="jssor_1"
     style="position: relative; margin: 10px auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
        <div
            style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
        <div
            style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
    </div>
    <div data-u="slides"
         style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="img/02.jpg"/>
        </div>
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="img/04.jpg"/>
        </div>
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="img/05.jpg"/>
        </div>
        <div data-p="112.50" style="display: none;">
            <img data-u="image" src="img/09.jpg"/>
        </div>
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
        <!-- bullet navigator item prototype -->
        <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>
    <!-- Arrow Navigator -->
    <span data-u="arrowleft" class="jssora12l" style="top:125px;left:0px;width:30px;height:46px;"
          data-autocenter="2"></span>
    <span data-u="arrowright" class="jssora12r" style="top:125px;right:0px;width:30px;height:46px;"
          data-autocenter="2"></span>
    <a href="http://www.jssor.com" style="display:none">Bootstrap Carousel</a>
</div>

<!-- banner1 -->
<div class="content">
    <a href="Category/Accesories" class="box1">
        Accessories
    </a>
    <a href="Category/Bag" class="box2">
        Bag
    </a>
    <a href="Category/Batik Weare" class="box3">
        Batik Weare
    </a>
    <a href="Category/Batik" class="box4">
        Batik
    </a>
    <a href="Category/Gerabah" class="box5">
        Gerabah
    </a>
    <a href="Category/Handycraft" class="box6">
        Handycraft
    </a>
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