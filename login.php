<?php
include_once 'config.php';

if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SWARZIE</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
   
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
      .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: transparent;
   color: black;
   text-align: center;
}
    </style>
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
     
    </form>
 <form class="form-inline my-2 my-lg-0">
      
    </form>
  </div>
</nav>

    <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>

    <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>

    <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
  <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>
	<div class="container" style="margin-top: 90px;">
        <?php
			if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
				include 'user.php';
				$user = new User();
				$conditions['where'] = array(
					'id' => $sessData['userID'],
				);
				$conditions['return_type'] = 'single';
				$userData = $user->getRows($conditions);
		?>
         <?php echo $userData['first_name']; ?>!
        <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
		<div class="regisFrm">
			<p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
            <p><b>Email: </b><?php echo $userData['email']; ?></p>
            <p><b>Bio: </b><?php echo $userData['bio']; ?></p>
		</div>
        <?php }else{ ?>
		<h1 style="text-align:center">Login </h1>
        <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
		<div class="regisFrm">
			<form action="userAccount.php" method="post">
				<input type="email" name="email" placeholder="EMAIL" required="">
				<input type="password" name="password" placeholder="PASSWORD" required="">
				<div class="send-button">
					<input type="submit" name="loginSubmit" value="LOGIN">
				</div>
			</form>
            <p>Don't have an account? <a href="registration.php">Register</a></p>
		</div>
        <?php } ?>
	</div>

 <div class="footer">
  <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div> 

</body>
</html>