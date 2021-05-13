<?php
include_once 'config.php';

if(empty($sessData['userLoggedIn']) || empty($sessData['userID'])){
 header("Location: index.php");
 exit;
}

include_once 'user.php';
$user = new User();
$conditions['where'] = array(
 'id' => $sessData['userID']
);
$conditions['return_type'] = 'single';
$userData = $user->getRows($conditions);

// Include and initialize DB class
require_once 'DB.class.php';
$db = new DB();

// Fetch the users data
$images = $db->getRows('images');

// Get status message from session
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}

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
      <a href="useaccount.php?logoutSubmit=1" class="logout">Logout</a>
    </form>
  </div>
</nav>
<div class="container" style="margin-top: 90px;">
 <h1> Manage Gallery</h1>
 <div class="container bootstrap snippets bootdey">
    <!-- Display status message -->
    <?php if(!empty($statusMsg)){ ?>
    <div class="col-xs-12">
        <div class="alert alert-<?php echo $statusMsgType; ?>"><?php echo $statusMsg; ?></div>
    </div>
    <?php } ?>
	
    <div class="row">
        <div class="col-md-12 head">
            <h5>Images</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="addEdit.php" class="btn btn-success"><i class="plus"></i> New Image</a>
            </div>
        </div>
		
        <!-- List the images -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th width="5%"></th>
                    <th width="10%">Image</th>
                    <th width="30%">Title</th>
                    <th width="18%">Category</th>
                    <th width="15%">Created</th>
                    <th width="8%">Status</th>
                    <th width="14%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
				if(!empty($images)){
					foreach($images as $row){
						$statusLink = ($row['status'] == 1)?'postAction.php?action_type=block&id='.$row['id']:'postAction.php?action_type=unblock&id='.$row['id'];
						$statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active';
				?>
                <tr>
                    <td><?php echo '#'.$row['id']; ?></td>
                    <td><img src="<?php echo 'uploads/images/'.$row['file_name']; ?>" alt="" /></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo ucwords(str_replace('_', ' ',$row['category'])); ?></td>
                    <td><?php echo $row['created']; ?></td>
                    <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
                    <td>
                        <a href="addEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">edit</a>
                        <a href="postAction.php?action_type=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?true:false;">delete</a>
                    </td>
                </tr>
                <?php } }else{ ?>
                <tr><td colspan="6">No image(s) found...</td></tr>
                <?php } ?>
            </tbody>
        </table>
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