<?php 

	// Allow the config
	define('__CONFIG__', true);
	// Require the config
	require_once "inc/config.php"; 

  ForceLogin();
  
  $user_id = $_SESSION['user_id'];

  $getUserInfo = $con->prepare("SELECT email, reg_time FROM users WHERE user_id = :user_id LIMIT 1");
  $getUserInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
  $getUserInfo->execute();

  if($getUserInfo->rowCount() == 1) {
    //user found
    $User = $getUserInfo->fetch(PDO::FETCH_OBJ);
  } else {
    //user is not signed in.
    header("Location: /php_login/logout.php"); exit;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Photo Gallery</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="/php_login/assets/js/javascript.js"></script>

    <style media="screen" type="text/css">
      html {
        font-family: "Montserrat", sans-serif;
        font-style: normal;
        font-weight: 400;
      }

      body, h1, p, h2 {
        font-family: "Montserrat", sans-serif
      }
        
      header {
        background-color: #f0f0f0;
        color: #616060;
        text-align: center;
        padding-top: 90px; 
        margin: -10px;
        height: 250px;
        margin-bottom: 25px;
      }

      h6 {
        margin: 0  1rem;
        line-height: 19px;
      }

      input {
        margin: 0 1rem;
      }
        
      footer {
        background-color: #969696;
        color: #ffffff;
        text-align: center;
        font-size: 12px;
        margin: -10px;
        padding: 15px;
        margin-top: 50px;
      }

      .container .btn {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
      }

      .container .btn:hover {
        background-color: black;
      }

      * {
        box-sizing: border-box;
      }

      .row::after {
        content: "";
        clear: both;
        display: block;
      }

      .tekst {
        margin: 40px;
      }
        
      .header {
        text-align: center;
        padding: 32px;
      }

      .upload {
        display: flex;
        justify-content: center;
        margin: 20px;
      }
        
      .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
      }

      .column img {
        vertical-align: middle;
      }

      .column {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
        padding: 10px;
      }

      .pix-container {
        margin-bottom: 20px;
      }

      .btn {
        border: none;
        background-color: #e9e9e9;
        border-radius: 5px;
        color: #969696
      }

      .linkBtn {
        margin-left: 8px;
      }

      svg {
        fill: rgb(155, 155, 155);
      }

      svg:hover {
        fill: rgb(194, 100, 100);
      }

      .likeBtn {
        display: flex;
      }

      .likeBtn > button {
        margin: 4px;
        color: black;
        border-radius: 4px;
        height: 18px;
      }

      .image {
        width: 100%;
      }

      .likeBtn > button:hover {
        background-color: lightgrey;
      }

      .caption {
        padding-left: 5px;
        margin-top: 0;
      }

      @media screen and (min-width: 700px) {
        .column {
          -ms-flex: 33.33%;
          flex: 33.33%;
          max-width: 33.33%;
          padding: 5px;
        }
      }

      @media screen and (max-width: 700px) {
        .upload {
          display: block;
        }
      }
    </style>
  </head>

  <body onload="onStart()">

    <header>
      <h1>PHOTO GALLERY</h1>
    </header>

  	<div class="dashboard">
      <h3>Dashboard</h3>
      <p>Hello <b><?php echo $User->email; ?></b>, you registered at <?php echo $User->reg_time; ?></p>
      <p><a href="/php_login/logout.php">Logout</a></p>
  	</div>

    <div class="upload">
      <h6>Upload your own photo: </h6>
      <input type=file name=filename id=file>
      <input type="text" id="captionInput" placeholder="Add caption">
      <button type=button onclick='test()'>Upload</button>
    </div>

    <article>
      <!-- Photo Grid -->
      <div class="row">
        <div class="column">

          <div class="pix-container">
            <div>
              <a href="andres.jpg"> <img alt="image" src="/php_login/images/andres.jpg" style="width:100%"></a>
            </div>
            <div class="likeBtn">
              <button type="button" class="likeButton">
                <svg class="heart" version="1.1" viewBox="0 0 32 32" width="13" height="13" aria-hidden="false">
                  <path d="M17.4 29c-.8.8-2 .8-2.8 0l-12.3-12.8c-3.1-3.1-3.1-8.2 0-11.4 3.1-3.1 8.2-3.1 11.3 0l2.4 2.8 2.3-2.8c3.1-3.1 8.2-3.1 11.3 0 3.1 3.1 3.1 8.2 0 11.4l-12.2 12.8z">
                  </path>
                </svg>
              </button>
              <button type="button" class="deleteButton">
              Delete
              </button>
            </div>
            <div contenteditable="true">
              <p class="caption">Turtle in the blue sea</p>
            </div>
          </div>
          
        </div>

        <div class="column">
          <div class="pix-container">
            <div>
              <a href="joshuag.jpg"> <img alt="image" src="/php_login/images/joshuag.jpg" style="width:100%"></a>
            </div>
            <div class="likeBtn">
              <button type="button" class="likeButton">
                <svg class="heart" version="1.1" viewBox="0 0 32 32" width="13" height="13" aria-hidden="false">
                  <path d="M17.4 29c-.8.8-2 .8-2.8 0l-12.3-12.8c-3.1-3.1-3.1-8.2 0-11.4 3.1-3.1 8.2-3.1 11.3 0l2.4 2.8 2.3-2.8c3.1-3.1 8.2-3.1 11.3 0 3.1 3.1 3.1 8.2 0 11.4l-12.2 12.8z">
                  </path>
                </svg>
              </button>
              <button type="button" class="deleteButton">
              Delete
              </button>
            </div>
            <div contenteditable="true">
              <p class="caption">Cloudy landscape</p>
            </div>
          </div>

        </div>

        <div class="column">
          <div class="pix-container">
            <div>
              <a href="ricardo.jpg"> <img alt="image" src="/php_login/images/ricardo.jpg" style="width:100%"></a>
            </div>
            <div class="likeBtn">
              <button type="button" class="likeButton">
                <svg class="heart" version="1.1" viewBox="0 0 32 32" width="13" height="13" aria-hidden="false">
                  <path d="M17.4 29c-.8.8-2 .8-2.8 0l-12.3-12.8c-3.1-3.1-3.1-8.2 0-11.4 3.1-3.1 8.2-3.1 11.3 0l2.4 2.8 2.3-2.8c3.1-3.1 8.2-3.1 11.3 0 3.1 3.1 3.1 8.2 0 11.4l-12.2 12.8z">
                  </path>
                </svg>
              </button>
              <button type="button" class="deleteButton">
              Delete
              </button>
            </div>
            <div contenteditable="true">
              <p class="caption">Double stairs</p>
            </div>
          </div>

        </div>
      </div>
      <div class="tekst">
        <h2>Overview</h2>
        <p>Responsive web design for web photo gallery.</p>
        <img src="/php_login/images/joshua.jpg" alt="sun"
          style="max-width:100%;height:auto;">
      </div>
    </article>

    <footer>
      <p>Web photo gallery.</p>
      <p>@Matevz Sesel</p>
    </footer>

  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>
