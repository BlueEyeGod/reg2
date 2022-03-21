<?php
session_start();

// initializing variables
$fullname = "";
$phone = "";
$username = "";
$password = "";
$email    = "";
$coupon   = ""; 
$refer   = "";
$user_type = "user";
$email_exist = "";

//Dashboard
$total_balance = 1000;
$cash_points = 0;
$num_referral = 0;

//Profile setting
$bankname = "";
$accountnum = "";
$accountname = "";
$facebook = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'cyrilproject');
$db = mysqli_connect('cashclip@localhost', 'cashclip_accounts', 'Michaelcashclip', 'cashclip_Registration');
 

// call the register() function if register_btn is clicked
if (isset($_POST['reg_user'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $fullname, $phone, $errors, $username, $coupon, $refer,$user_type, $email, $email_exist;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);
  $phone  =  e($_POST['phone']);
  $fullname  =  e($_POST['fullname']);
  $coupon  =  e($_POST['coupon']);
  $refer  =  e($_POST['refer']);
  $user_type  =  "user";

  // check if email already exist
  $email_check_query = mysqli_query($db, "SELECT * FROM users WHERE email = '{$email}' ");
  $rowCount = mysqli_num_rows($email_check_query);
    
if(!empty($username) && !empty($email) && !empty($fullname) && !empty($phone) && !empty($password_1) && !empty($password_2) && !empty($coupon) && !empty($refer)){
            
  // check if user email already exist
  if($rowCount > 0) {
      $email_exist = array_push($errors, "User with email already exist!");
  }
}

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}
    if (empty($fullname)) { array_push ($errors, "Full Name is required");}
  if (empty($phone)) { array_push ($errors, "Phone Number is required");}
  
  if (empty($coupon)) { array_push($errors, "Coupon is required"); }

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

			$query = "INSERT INTO users (fullname, phone, username, email, password, coupon, refer, status, user_type) 
  			  VALUES('$fullname', '$phone', '$username', '$email', '$password', '$coupon', '$refer', 'pending', 'user')";
			mysqli_query($db, $query);

			// get id of the created user
			// $logged_in_user_id = mysqli_insert_id($db);

			// $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "your account is now pending for approval";
			header('location: verifycoupon.php');				
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_user'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);

      if ($logged_in_user['status'] === 'pending') {
			  header('location: verifycoupon.php');	  
			}
			if ($logged_in_user['user_type'] === 'admin' && $logged_in_user['status'] === 'approved') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/adminpanel.php');		  
      }
      if($logged_in_user['user_type'] === 'user' && $logged_in_user['status'] === 'approved' ){
				$_SESSION['user'] = $logged_in_user;
				//$_SESSION['success']  = "You are now logged in";
				header('location: index1.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

?>