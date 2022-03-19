<?php

// define( 'USER_LEVEL_ADMIN', '1');

// // initializing variables
// $fullname = "";
// $phone = "";
// $username = "";
// $password = "";
// $email    = "";
// $coupon   = ""; 
// $refer   = "";
// $user_type = "user";

// //Dashboard
// $total_balance = 1000;
// $cash_points = 0;
// $num_referral = 0;

// //Profile setting
// $bankname = "";
// $accountnum = "";
// $accountname = "";
// $facebook = "";
// $errors = array(); 

// // connect to the database
// $db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
// if (isset($_POST['reg_user'])) {
//   // receive all input values from the form
//   $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
//   $phone = mysqli_real_escape_string($db, $_POST['phone']);
//   $username = mysqli_real_escape_string($db, $_POST['username']);
//   $email = mysqli_real_escape_string($db, $_POST['email']);
//   $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
//   $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
//   $coupon = mysqli_real_escape_string($db, $_POST['coupon']);
//   $refer = mysqli_real_escape_string($db, $_POST['refer']);
//   //$coupon_2 = mysqli_real_escape_string($db, $_POST['coupon_2']);
  

//   // Recieve all input values from profile
//  // $bankname = mysqli_real_escape_string($db, $_POST['bank name']);
//   //$accountnum = mysqli_real_escape_string($db, $_POST['account number']);
//   //$accountname = mysqli_real_escape_string($db, $_POST['account name']);
  
//   // form validation: ensure that the form is correctly filled ...
//   // by adding (array_push()) corresponding error unto $errors array
//   if (empty($fullname)) { array_push ($errors, "Full Name is required");}
//   if (empty($phone)) { array_push ($errors, "Phone Number is required");}
//   if (empty($username)) { array_push($errors, "Username is required"); }
//   if (empty($email)) { array_push($errors, "Email is required"); }
//   if (empty($coupon)) { array_push($errors, "Coupon is required"); }
//   //if ($coupon != $coupon_2) {
//   //array_push($errors, "Wrong coupon code");
//   //}

//   if (empty($password_1)) { array_push($errors, "Password is required"); }
//   if ($password_1 != $password_2) {
// 	array_push($errors, "The two passwords do not match");
//   }
  

//   // first check the database to make sure 
//   // a user does not already exist with the same username and/or email
//   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
//   $result = mysqli_query($db, $user_check_query);
//   $user = mysqli_fetch_assoc($result);
  
//   if ($user) { // if user exists
//     if ($user['username'] === $username) {
//       array_push($errors, "Username already exists");
//     }

//     if ($user['email'] === $email) {
//       array_push($errors, "email already exists");
//     }
    
//   }


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
$db = mysqli_connect('localhost', 'root', '', 'registration');
 

// call the register() function if register_btn is clicked
if (isset($_POST['reg_user'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $fullname, $phone, $errors, $username, $coupon, $refer,$user_type, $email;

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

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
        	$query = "INSERT INTO users (fullname, phone, username, email, password, coupon, refer, status, user_type) 
  			  VALUES('$fullname', '$phone', '$username', '$email', '$password', '$coupon', '$refer', 'pending', '$user_type')";
        mysqli_query($db, $query);
			$_SESSION['success']  = "your account is now pending for approval";
			header('location: verifycoupon.php');
		}else{
			     	$query = "INSERT INTO users (fullname, phone, username, email, password, coupon, refer, status, user_type) 
  			  VALUES('$fullname', '$phone', '$username', '$email', '$password', '$coupon', '$refer', 'pending', 'user')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index1.php');				
		}
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
if (isset($_POST['login_btn'])) {
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
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/adminpanel.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

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