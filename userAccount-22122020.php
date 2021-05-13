<?php
include_once 'config.php';

//load and initialize user class
include 'user.php';
$user = new User();
$sessData = array();
if(isset($_POST['signupSubmit'])){
	//check whether user details are empty
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
		//password and confirm password comparison
        if($_POST['password'] !== $_POST['confirm_password']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
			//check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $user->getRows($prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists, please use another email.';
            }else{
				//insert user data in the database
                $userData = array(
                    'first_name' => $_POST['first_name'],
                    'last_name' => $_POST['last_name'],
                    'email' => $_POST['email'],
                    'bio' => $_POST['bio'],
                    'password' => md5($_POST['password']),
                );
                $insert = $user->insert($userData);
				//set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have registered successfully, log in with your credentials.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
	//store signup status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'login.php':'registration.php';
	//redirect to the home/registration page
    header("Location:".$redirectURL);
}elseif(isset($_POST['loginSubmit'])){
    $redirectURL = 'login.php';
	//check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
		//get user data from user class
        $conditions['where'] = array(
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'status' => '1'
        );
        $conditions['return_type'] = 'single';
        $userData = $user->getRows($conditions);
		//set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['id'];
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'Welcome '.$userData['user_name'].'!';
            /*$sessData = array(
                'userLoggedIn' => TRUE,
                'userID' => $userData['id'],
                'status' => array('type' => 'success', 'msg' => 'Welcome '.$userData['first_name'].'!')
            );*/
            $redirectURL = 'edit-profile.php';
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Wrong email or password, please try again.'; 
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email and password.'; 
    }
	//store login status into the session
    $_SESSION['sessData'] = $sessData;
    
	//redirect to the home page
    header("Location: $redirectURL");
    exit;
}if(isset($_POST['proSubmit'])){
    $sessData = $_SESSION['sessData'];
	//check whether user details are empty
    if(!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_SESSION['sessData']['userID'])){
        $userID = $_SESSION['sessData']['userID'];
        //check whether user exists in the database
        $prevCon['where'] = array('email'=>$_POST['email']);
        $prevCon['where_not'] = array('id'=>$userID);
        $prevCon['return_type'] = 'count';
        $prevUser = $user->getRows($prevCon);
        if($prevUser > 0){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Email already exists, please use another email.';
        }else{
            $userData = array(
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'bio' => $_POST['bio']
            );
            
            $fileErr = 0;
			if(isset($_FILES['picture']['name']) && $_FILES['picture']['name'] != ""){
				$targetDir = 'uploads/profile_picture/';
				$fileName = time().'_'.basename($_FILES["picture"]["name"]);
				$targetFilePath = $targetDir. $fileName;
				$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
				$allowTypes = array('jpg','png','jpeg','gif');
				if(in_array($fileType, $allowTypes)){
					if(move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)){
						$userData['picture'] = $fileName;
						
						// Delete previous profile picture
						@unlink('uploads/profile_picture/'.$prevPicture);
					}
				}else{
					$fileErr = 1;
					$sessData['status']['type'] = 'error';
					$sessData['status']['msg'] = 'Please select only jpg/png/gif file.';
				}
			}
            
            if($fileErr == 0){
            
                //insert user data in the database
                
                if(!empty($_POST['password'])){
                    $userData['password'] = md5($_POST['password']);
                }
                $insert = $user->update($userData, $userID);
                //set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Profile updated successfully!';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
	//store signup status into the session
    $_SESSION['sessData'] = $sessData;
    //$redirectURL = ($sessData['status']['type'] == 'success')?'profile.php':'edit-profile.php';
    $redirectURL = 'edit-profile.php';
	//redirect to the home/registration page
    header("Location:".$redirectURL);
}elseif(!empty($_REQUEST['logoutSubmit'])){
	//remove session data
    unset($_SESSION['sessData']);
    session_destroy();
	//store logout status into the ession
    $sessData['status']['type'] = 'success';
    $sessData['status']['msg'] = 'You have logout successfully from your account.';
    $_SESSION['sessData'] = $sessData;
	//redirect to the home page
    header("Location:edit-profile.php");
}else{
	//redirect to the home page
    header("Location:edit-profile.php");
}
