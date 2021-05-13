<?php
include_once 'config.php';

if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
 $loggedIn = true;
}else{
 $loggedIn = false;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SWARZIE</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
         box-sizing: border-box;
}

.column {
  float: left;
 width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
     .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: transparent;
   color: black;
   text-align: center;
}
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
 
}  
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class=>
    <img src="images/bull.png" width="30" height="30" alt="" loading="lazy">
  </a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
       <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
       </a>
      </li>
      <li class="nav-item">
       </a>
      </li>
       <li class="nav-item">
        </a>
    
      </li>
    </ul>
    
 <form class="form-inline my-2 my-lg-0">
  <?php if($loggedIn){ ?>
  <a href="profile.php" class="profile">Profile</a>
  <?php }else{ ?>
      <a href="login.php" class="login">Login</a>
  <?php } ?>
    </form>
  </div>
</nav>

<main role="main" class="container">
<div class="container">

             
  <img src="images/bull.png" class="center" alt="Cinque Terre" width="200" height="200"> 
</div>

  <div class="starter-template">
    
    <p class="lead">GAME CATEGORIES</p>
  </div>
 <div class="row">
  <div class="column">
    <a href="games.php?cat=education">
    <img src="images/educate.jpg" alt="Snow" style="width:60%">
     </a> 
  </div>
  <div class="column">
    <a href="games.php?cat=action">
    <img src="images/action.jpg" alt="Forest" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="games.php?cat=adventure">
    <img src="images/advent.jpg" alt="Mountains" style="width:60%">
      </a> 
  </div>
</div>
  <div class="row row-centered">
  <div class="column">
    <a href="games.php?cat=sports">
    <img src="images/sport.jpg" alt="Snow" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="games.php?cat=role_play">
    <img src="images/rolep.jpg" alt="Forest" style="width:60%">
      </a> 
  </div>
  <div class="column">
    <a href="games.php?cat=simulation">
    <img src="images/simulate.jpg" alt="Mountains" style="width:60%">
      </a> 
  </div>
</div>       
 <div class="footer">
  <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div>         
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
