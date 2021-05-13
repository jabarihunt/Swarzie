<?php
/*
 * Author: CodexWorld
 * URL: http://www.codexworld.com
 * License URL: http://www.codexworld.com/license
 */
$statusMsg = '';
$msgClass = '';
if(isset($_POST['submit'])){
    // Get the submitted form data
    $email = $_POST['email'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Check whether submitted data is not empty
    if(!empty($email) && !empty($name) && !empty($subject) && !empty($message)){
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            $statusMsg = 'Please enter your valid email.';
            $msgClass = 'errordiv';
        }else{
            // Recipient email
            $toEmail = 'tcobb@swarzie.com';
            $emailSubject = 'Contact Request Submitted by '.$name;
            $htmlContent = '<h2>Contact Request Submitted</h2>
                <h4>Name</h4><p>'.$name.'</p>
                <h4>Email</h4><p>'.$email.'</p>
                <h4>Subject</h4><p>'.$subject.'</p>
                <h4>Message</h4><p>'.$message.'</p>';
            
            // Set content-type header for sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";
            
            // Send email
            if(mail($toEmail,$emailSubject,$htmlContent,$headers)){
                $statusMsg = 'Your contact request has been submitted successfully !';
                $msgClass = 'succdiv';
            }else{
                $statusMsg = 'Your contact request submission failed, please try again.';
                $msgClass = 'errordiv';
            }
        }
    }else{
        $statusMsg = 'Please fill all the fields.';
        $msgClass = 'errordiv';
    }
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
<title>SWARZIE</title>
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
.mainContent {
    width: 60%;
    margin: 3em auto;
    background: #fff;
    padding: 2em;
}
.contactFrm h4 {
    font-size: 1em;
    color: #252525;
    margin-bottom: 0.5em;
    font-weight: 300;
    letter-spacing: 5px;
}
.contactFrm input[type="text"], .contactFrm input[type="email"] {
    width: 92%;
    color: #9370DB;
    background: #fff;
    outline: none;
    font-size: 0.9em;
    padding: .7em 1em;
    border: 1px solid #9370DB;
    -webkit-appearance: none;
    display: block;
    margin-bottom: 1.2em;
}
.contactFrm textarea {
    resize: none;
    width: 93.5%;
    background: #fff;
    color: #9370DB;
    font-size: 0.9em;
    outline: none;
    padding: .6em 1em;
    border: 1px solid #9370DB;
    min-height: 10em;
    -webkit-appearance: none;
}
.contactFrm input[type="submit"] {
    outline: none;
    color: #FFFFFF;
    padding: 0.5em 0;
    font-size: 1em;
    margin: 1em 0 0 0;
    -webkit-appearance: none;
    background: #9370DB;
    transition: 0.5s all;
    border: 2px solid #795CB4;
    -webkit-transition: 0.5s all;
    transition: 0.5s all;
    -moz-transition: 0.5s all;
    width: 47%;
    cursor: pointer;
}
.contactFrm input[type="submit"]:hover {
    background: none;
    color: #9370DB;
}
::-webkit-input-placeholder {
	color:#9370DB !important;
}
:-moz-placeholder { /* Firefox 18- */
	color:#9370DB !important;
}
::-moz-placeholder {  /* Firefox 19+ */
	color:#9370DB !important;
}
:-ms-input-placeholder {  
	color:#9370DB !important;
}

p.statusMsg{font-size:18px;}
p.succdiv{color: #008000;}
p.errordiv{color:#E80000;}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: transparent;
   color: black;
   text-align: center;
}
 h1{
   text-align:center;
   }
 p{
  text-align:center;
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
      <a href="hello.php" class="about" >Home</a>
    </form>
 <form class="form-inline my-2 my-lg-0">
    
    </form>
  </div>
</nav>
<div class="mainContent">
    <h1>About Swarzie</a></h1>
<p>Swarzie is a place where game developers and game lovers can unite. Whether learning or entertainment Swarzie will have innovative content that fits your mood. Feel free to contact with any questions, concerns, or comments.</p>
<p>Peace,<br> T.C.<br> Founder & Creator</p>
   
<div class="contactFrm">
        <?php if(!empty($statusMsg)){ ?>
            <p class="statusMsg <?php echo !empty($msgClass)?$msgClass:''; ?>"><?php echo $statusMsg; ?></p>
        <?php } ?>
        <form action="" method="post">
            <h4>Name</h4>
            <input type="text" name="name" placeholder="Your Name" required="">
            <h4>Email </h4>
            <input type="email" name="email" placeholder="email@example.com" required="">
            <h4>Subject</h4>
            <input type="text" name="subject" placeholder="Write subject" required="">
            <h4>Message</h4>
            <textarea name="message" placeholder="Write your message here" required=""> </textarea>
            <input type="submit" name="submit" value="Submit">
            <div class="clear"> </div>
        </form>
    </div>
</div>
<div class="footer">
  <p>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div> 
</body>
</html>
