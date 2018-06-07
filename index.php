<?php 
    define('__CONFIG__', true);
    //require the config
    require_once "inc/config.php";
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Photo Gallery</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>
    <div class="uk-section" style="background-image: url(php_login/images/elisha.jpg)">

      <h1 style="color:white; margin-left:40px">Welcome to <b style="color:DodgerBlue;">Photo Gallery</b> web page.</h1>
      <h4 style="color:grey; margin-left:40px">Login or create a new account.</h4>
      <div style="margin-left:40px">
        <?php echo "Today is: ";
        echo date("d. m. Y");
        ?>
      </div>
      

      <br>
      <br>
      <div class="uk-margin" style="margin-left:40px">
        <button class="uk-button uk-button-default"><a href="/php_login/login.php">Login</a> </button>
        <button class="uk-button uk-button-default"><a href="/php_login/register.php">Register</a></button>
      </div>
    </div>

    <br>

    <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="center: true">

<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@m uk-grid">
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/andres.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/chandler.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/coline.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/conner.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/cristina.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/elisha.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/lukas.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/joshuag.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/mark.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/matt.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/nitish.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/pierre.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/wine.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/ricardo.jpg" alt="">
        </div>
    </li>
    <li>
        <div class="uk-panel" style="margin:5px">
            <img src="php_login/images/steve.jpg" alt="">
        </div>
    </li>
</ul>

</div>

    <br><br><br>


    <?php require_once "inc/footer.php"; ?>
  </body>
</html>
