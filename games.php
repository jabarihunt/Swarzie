<?php
include_once 'config.php';

// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Fetch the users data
$conditions = array(
 'where' => array(
  'status' => '1'
 )
);
if(!empty($_GET['cat'])){
 $conditions['where']['category'] = $_GET['cat'];
}
$images = $db->getRows('images', $conditions);

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

.gallery{
     width: 100%;
}
.gallery .col-lg-3{
	width: 20%;
	float: left;
	text-align: center;
	margin-right: 20px;
	margin-bottom: 20px
}
.gallery .col-lg-3 a{
	text-decoration: none;
}
.gallery img {
    padding: .25rem;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: .25rem;
    max-width: 100%;
    height: 170px;
}
.col-lg-3 p{
	font-size: 17px;
	font-weight: 500;
	padding: 5px;
	margin: 0;
    color: #333;
}
    </style>
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- Fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<!-- Initialize fancybox -->
<script>
	$("[data-fancybox]").fancybox();
</script>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a href="index.php">
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
      <a href="index.php" class="login">Login</a>
    </form>
  </div>
</nav>

<main role="main" class="container">
<div class="container">

             
  <img src="images/bull.png" class="center" alt="Cinque Terre" width="200" height="200"> 
</div>

  <div class="starter-template">
    
    <p class="lead"><?php echo !empty($_GET['cat'])?strtoupper(str_replace('_', ' ',$_GET['cat'])):''; ?></p>
  </div>
 <div class="row">
  <div class="gallery">
   <?php
   if(!empty($images)){
   foreach($images as $row){
   $uploadDir = 'uploads/images/';
   $imageURL = $uploadDir.$row["file_name"];
   ?>
   <div class="col-lg-3">
   <!--<a href="<?php //echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php //echo $row["title"]; ?>" >-->
   <a href="profile.php?id=<?php echo $row["user_id"]; ?>">
   <img src="<?php echo $imageURL; ?>" alt="" />
   <p><?php echo $row["title"]; ?></p>
   </a>
   </div>
   <?php }
   } ?>
  </div>
</div>     
 <div class="footer">
  <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div>         
</main><!-- /.container -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
