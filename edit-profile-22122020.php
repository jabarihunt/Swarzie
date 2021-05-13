<?php
include_once 'config.php';

if(empty($sessData['userLoggedIn']) || empty($sessData['userID'])){
 header("Location: login.php");
 exit;
}

include_once 'user.php';
$user = new User();
$conditions['where'] = array(
 'id' => $sessData['userID']
);
$conditions['return_type'] = 'single';
$userData = $user->getRows($conditions);

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    //unset($_SESSION['sessData']['status']);
}

$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>SWARZIE</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SWARZIE</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
   
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

<!-- Bootstrap library -->
<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<!-- Stylesheet file -->
<link rel="stylesheet" type="text/css" href="css/style.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
  <link rel="stylesheet" href="css/fm.tagator.jquery.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">
<style>
  
  .form {
    width: 300px;
    margin: 0 auto;
}
  .form-control {
    height: 45px;
    padding: 10px;
    font-size: 16px;
    box-shadow: none;
    border-radius: 0;
    position: relative;
}

label {
    font-weight: 400;
    color: #444;
}

.dropzone {
    position: relative
    border: 1px solid rgba(0,0,0,0.03);
    min-height: 360px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    background: rgba(0,0,0,0.03);
    padding: 23px;
}
.dropzone.dz-clickable {
    cursor: pointer;
}
.dropzone .dz-default.dz-message {
    opacity: 1;
    -ms-filter: none;
    filter: none;
    -webkit-transition: opacity 0.3s ease-in-out;
    -moz-transition: opacity 0.3s ease-in-out;
    -o-transition: opacity 0.3s ease-in-out;
    -ms-transition: opacity 0.3s ease-in-out;
    transition: opacity 0.3s ease-in-out;
    background-repeat: no-repeat;
    background-position: 0 0;
    position: absolute;
    width: 428px;
    height: 123px;
    margin-left: -214px;
    margin-top: -61.5px;
    top: 50%;
    left: 50%;
    font-size:40px;
    color:#5bc0de;
}
  .footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color:transparent;
   color: black;
   text-align: center;
}

  #wrapper {
			padding: 15px;
      margin:100px auto;
      max-width:728px;
		}
		#input_tagator1 {
			width: 300px;
		}
		#activate_tagator2 {
			width: 300px;
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
      <a href="profile.php" class="profile">Profile</a>
    </form> 
 <form class="form-inline my-2 my-lg-0">
      <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
    </form>
  </div>
</nav>
<div class="container" style="margin-top: 90px;">
 <h1> Edit Profile</h1>
 <div class="container bootstrap snippets bootdey">
    <div class="row">
        <!-- Display status message -->
       <?php if(!empty($statusMsg)){ ?>
       <div class="col-xs-12">
           <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
       </div>
       <?php } ?>
       <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
           <div class="tab-content">
               <div class="tab-pane active" id="basic">
               <form action="userAccount.php" id="form" method="post" name="form" enctype="multipart/form-data">
                   <form class="form-horizontal" role="form">
                       <div class="form-group">
                           <label for="inputfirstname" class="col-lg-2 control-label">First Name</label>
                           <div class="col-lg-10">
                               <input type="text" name="first_name" class="form-control" id="inputfirstname" placeholder="First Name" value="<?php echo !empty($userData['first_name'])?$userData['first_name']:''; ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputlastname" class="col-lg-2 control-label">Last Name</label>
                           <div class="col-lg-10">
                               <input type="text" name="last_name" class="form-control" id="inputlastname" placeholder="Last Name" value="<?php echo !empty($userData['last_name'])?$userData['last_name']:''; ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputemail" class="col-lg-2 control-label">Email</label>
                           <div class="col-lg-10">
                               <input type="email" name="email" class="form-control" id="inputemail" placeholder="Email" value="<?php echo !empty($userData['email'])?$userData['email']:''; ?>">
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputemail" class="col-lg-2 control-label">Bio</label>
                           <div class="col-lg-10">
                              <textarea name="bio" class="form-control" placeholder="About me..."><?php echo !empty($userData['bio'])?$userData['bio']:''; ?></textarea>
                           </div>
                       </div>
                       <div class="form-group">
                           <label for="inputpassword" class="col-lg-2 control-label">Password</label>
                           <div class="col-lg-10">
                               <input type="password" name="password" class="form-control" id="inputpassword" placeholder="Password">
                           </div>
                       </div>
                       <div class="form-group">
                           <label  class="col-lg-2 control-label">Photo</label>
                           <div class="col-lg-10">
                            <?php if(!empty($userPicture)){ ?>
                            <img src="<?php echo $userPicture; ?>" alt="">
                            <?php } ?>
                               <input type="file" name="picture" class="filestyle" data-classbutton="btn btn-default btn-lg" data-input="false" id="filestyle-0" tabindex="-1" style="position: fixed; left: -500px;"><div class="bootstrap-filestyle input-group"><input type="text" class="form-control " disabled="" placeholder="Choose file"> <span class="input-group-btn" tabindex="0">  <label for="filestyle-0" class="btn btn-default btn-lg"> <i class="fa fa-file-image-o" aria-hidden="true"></i>      </label></div>
                            
                           </div>
                       </div>
                        <div class="form-group">
                         <input type="submit" class="btn btn-primary" name="proSubmit">
                       </div>
                     
                   </form>
               </div>
           </div>
                      
													 <!--<div class="form-group">
                <label  class="col-lg-2 control-label">Game Tags</label>
                <div class="col-lg-10">
                 <input id="activate_tagator2" type="text" class="tagator" value="" data-tagator-show-all-options-on-focus="true" data-tagator-autocomplete="['education', 'action', 'adventure', 'sports', 'role play', 'simulation']">
                </div>
              </div>-->
       </div>
    </div>
 </div>
</div>
 <div class="footer"> 
  
   <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</body>
  <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/fm.tagator.jquery.js"></script>
	<script>
		$(function () {
			var $input_tagator1 = $('#input_tagator1');
			var $activate_tagator1 = $('#activate_tagator1');
			$activate_tagator1.click(function () {
				if ($input_tagator1.data('tagator') === undefined) {
					$input_tagator1.tagator({
						autocomplete: ['education', 'action', 'adventure', 'sports', 'role play', 'simulation'],
						useDimmer: true
					});
					$activate_tagator1.val('destroy tagator');
				} else {
					$input_tagator1.tagator('destroy');
					$activate_tagator1.val('activate tagator');
				}
			});
			$activate_tagator1.trigger('click');
		});
	</script>         
                    
</script>      
</html>