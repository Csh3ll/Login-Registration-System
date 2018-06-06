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

    <title>Page Title</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>

  	<div class="uk-section uk-container">

        <h1>Welcome to the <b>Photo Gallery</b> page.</h1>
        <h4>You need to login or create a new account.</h4>

        <?php echo "Today is: ";
                echo date("d. m. Y");
        ?>

        <p>
            <a href="/php_login/login.php">Login</a> 
            <a href="/php_login/register.php">Register</a>
        </p>

  	</div>


    <?php require_once "inc/footer.php"; ?>
    
  </body>
</html>
