<?php
include_once 'config.php';

/*if(empty($sessData['userLoggedIn']) || empty($sessData['userID'])){
 header("Location: index.php");
 exit;
}*/

$userID = !empty($sessData['userID'])?$sessData['userID']:$_GET['id'];

include_once 'user.php';
$user = new User();
$conditions['where'] = array(
 'id' => $userID
);
$conditions['return_type'] = 'single';
$userData = $user->getRows($conditions);

if(empty($userData)){
 header("Location: index.php");
 exit;
}
    
    
// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Fetch the images data
$condition = array('where' => array('status' => 1));
$images = $db->getRows('images', $condition);

$userPicture = !empty($userData['picture'])?'uploads/profile_picture/'.$userData['picture']:'images/avatar.png';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>SWARZIE</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">
   
<!-- Fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- Stylesheet file -->
<link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="js/jquery.min.js"></script>

<!-- Fancybox JS library -->
<script src="fancybox/jquery.fancybox.js"></script>

<!-- Initialize fancybox -->
<script>
	$("[data-fancybox]").fancybox();
</script>
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
<link rel="manifest" href="images/site.webmanifest">
<style>
   
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
  }
  {
 p.hidden {border-style: hidden;}   
  }
  .comment-form-container {
	background: #FFFFFF;
	border: #FFFFFF 1px solid;
	padding: 20px;
	border-radius: 2px;
}

.input-row {
	margin-bottom: 20px;
}

.input-field {
	width: 100%;
	border-radius: 2px;
	padding: 10px;
	border: #e0dfdf 1px solid;
}

.btn-submit {
	padding: 10px 20px;
	background: #333;
	border: #1d1d1d 1px solid;
	color: #f0f0f0;
	font-size: 0.9em;
	width: 100px;
	border-radius: 2px;
    cursor:pointer;
}

ul {
	list-style-type: none;
}

.comment-row {
	border-bottom: #e0dfdf 1px solid;
	margin-bottom: 15px;
	padding: 15px;
}

.outer-comment {
	background: #F0F0F0;
	padding: 20px;
	border: #dedddd 1px solid;
}

span.commet-row-label {
	font-style: italic;
}

span.posted-by {
	color: #09F;
}

.comment-info {
	font-size: 0.8em;
}
.comment-text {
    margin: 10px 0px;
}
.btn-reply {
    font-size: 0.8em;
    text-decoration: underline;
    color: #888787;
    cursor:pointer;
}
#comment-message {
    margin-left: 20px;
    color: #189a18;
    display: none;
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
     
    </ul>
        
       <div class="form-group"> 
     <form class="form-inline my-2 my-lg-0">
      <a href="index.php" class="home">Home</a>
    </form>
        </div>
        <div class="form-group">
 <form class="form-inline my-2 my-lg-0">
      <a href="useaccount.php?logoutSubmit=1" class="logout">Logout</a>
    </form>
  </div>
  </div>
</nav>
  <div class="container" style="margin-top: 90px;">
     <h1 style="text-align:center">PROFILE</h1>
     <img src="<?php echo $userPicture; ?>" alt="Avatar" class="center">
     
     <?php if(!empty($sessData['userLoggedIn']) && ($sessData['userLoggedIn'] == $userID)){ ?>
     <div class="head">
      <a href="edit-profile.php" class="glink">Edit Profile</a>
      <a href="manage.php" class="glink" style="margin-right: 10px;">Manage Gallery</a>
     </div>
     <?php } ?>
    <div class="gallery">
        <?php
        if(!empty($images)){
            foreach($images as $row){
				$uploadDir = 'uploads/images/';
                $imageURL = $uploadDir.$row["file_name"];
        ?>
       <div class="col-lg-3">
            <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
                <img src="<?php echo $imageURL; ?>" alt="" />
				<p><?php echo $row["title"]; ?></p>
            </a>
       </div>
        <?php }
        } ?>
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
 <div class="myDiv">
  <h2></h2>
  <p></p>
</div>

<div class="regisFrm">
			<p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name']; ?></p>
   <p><b>Email: </b><?php echo $userData['email']; ?></p>
   <p><b>Bio: </b><?php echo $userData['bio']; ?></p>
</div>
  
 <div class="comment-form-container">
        <form id="frm-comment">
            <div class="input-row">
                <input type="hidden" name="comment_id" id="commentId"
                    placeholder="Name" /> <input class="input-field"
                    type="text" name="name" id="name" placeholder="Name" />
            </div>
            <div class="input-row">
                <textarea class="input-field" type="text" name="comment"
                    id="comment" placeholder="Add a Comment">  </textarea>
            </div>
            <div>
                <input type="button" class="btn-submit" id="submitButton"
                    value="Publish" /><div id="comment-message">Comments Added Successfully!</div>
            </div>

        </form>
    </div>
 <?php if(!empty($userData['game_page_url'])){ ?>
 <div class="game-frame">
  <iframe id="game-element" allowfullscreen="" allow="autoplay; fullscreen; camera; focus-without-user-activation *;" name="gameFrame" scrolling="no" sandbox="allow-forms allow-modals allow-orientation-lock allow-pointer-lock allow-popups allow-popups-to-escape-sandbox allow-presentation allow-scripts allow-same-origin allow-downloads" src="<?php echo $userData['game_page_url']; ?>" width="100%" title="<?php echo $userData['first_name'].' '.$userData['last_name']; ?>" style="height: 400px;border: none;"></iframe>
 </div>
 <?php } ?>
  </div>
    <div id="output"></div>
    <div class="footer">
  <p><br><a href="about.php">About</a></br>© 2020 Tinico Enterprises.  All rights reserved.</p>
</div> 
</body>
<script>
            function postReply(commentId) {
                $('#commentId').val(commentId);
                $("#name").focus();
            }

            $("#submitButton").click(function () {
            	   $("#comment-message").css('display', 'none');
                var str = $("#frm-comment").serialize();

                $.ajax({
                    url: "comment-add.php",
                    data: str,
                    type: 'post',
                    success: function (response)
                    {
                        var result = eval('(' + response + ')');
                        if (response)
                        {
                        	$("#comment-message").css('display', 'inline-block');
                            $("#name").val("");
                            $("#comment").val("");
                            $("#commentId").val("");
                     	   listComment();
                        } else
                        {
                            alert("Failed to add comments !");
                            return false;
                        }
                    }
                });
            });
            
            $(document).ready(function () {
            	   listComment();
            });

            function listComment() {
                $.post("comment-list.php",
                        function (data) {
                               var data = JSON.parse(data);
                            
                            var comments = "";
                            var replies = "";
                            var item = "";
                            var parent = -1;
                            var results = new Array();

                            var list = $("<ul class='outer-comment'>");
                            var item = $("<li>").html(comments);

                            for (var i = 0; (i < data.length); i++)
                            {
                                var commentId = data[i]['comment_id'];
                                parent = data[i]['parent_comment_id'];

                                if (parent == "0")
                                {
                                    comments = "<div class='comment-row'>"+
                                    "<div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                                    "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                                    "<div><a class='btn-reply' onClick='postReply(" + commentId + ")'>Reply</a></div>"+
                                    "</div>";

                                    var item = $("<li>").html(comments);
                                    list.append(item);
                                    var reply_list = $('<ul>');
                                    item.append(reply_list);
                                    listReplies(commentId, data, reply_list);
                                }
                            }
                            $("#output").html(list);
                        });
            }

            function listReplies(commentId, data, list) {
                for (var i = 0; (i < data.length); i++)
                {
                    if (commentId == data[i].parent_comment_id)
                    {
                        var comments = "<div class='comment-row'>"+
                        " <div class='comment-info'><span class='commet-row-label'>from</span> <span class='posted-by'>" + data[i]['comment_sender_name'] + " </span> <span class='commet-row-label'>at</span> <span class='posted-at'>" + data[i]['date'] + "</span></div>" + 
                        "<div class='comment-text'>" + data[i]['comment'] + "</div>"+
                        "<div><a class='btn-reply' onClick='postReply(" + data[i]['comment_id'] + ")'>Reply</a></div>"+
                        "</div>";
                        var item = $("<li>").html(comments);
                        var reply_list = $('<ul>');
                        list.append(item);
                        item.append(reply_list);
                        listReplies(data[i].comment_id, data, reply_list);
                    }
                }
            }
        </script>
</html>
