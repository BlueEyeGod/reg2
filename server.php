<?php


define( 'USER_LEVEL_ADMIN', '1');

// initializing variables
$fullname = "";
$phone = "";
$username = "";
$password = "";
$email    = "";
$coupon   = ""; 
$refer   = "";

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

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $coupon = mysqli_real_escape_string($db, $_POST['coupon']);
  $refer = mysqli_real_escape_string($db, $_POST['refer']);
  //$coupon_2 = mysqli_real_escape_string($db, $_POST['coupon_2']);
  

  // Recieve all input values from profile
 // $bankname = mysqli_real_escape_string($db, $_POST['bank name']);
  //$accountnum = mysqli_real_escape_string($db, $_POST['account number']);
  //$accountname = mysqli_real_escape_string($db, $_POST['account name']);
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fullname)) { array_push ($errors, "Full Name is required");}
  if (empty($phone)) { array_push ($errors, "Phone Number is required");}
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($coupon)) { array_push($errors, "Coupon is required"); }
  //if ($coupon != $coupon_2) {
  //array_push($errors, "Wrong coupon code");
  //}

  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
    
  }

 

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (fullname, phone, username, email, password, coupon, refer, status) 
  			  VALUES('$fullname', '$phone', '$username', '$email', '$password', '$coupon', '$refer', 'pending')";
  	mysqli_query($db, $query);
  	echo '"your account is now pending for approval"';
    header('location: verifycoupon.php');
    
  }
}

// Login points
  
// ... 

// LOGIN USER

  
  
   
  ?>