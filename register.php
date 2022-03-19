<?php 
$errors = array(); 
//error_reporting(0);
if(isset($_POST['signup']))
{
$fullname=$_POST['fullname'];
$email=$_POST['email']; 
$phone=$_POST['phone'];
$username=$_POST['username'];
$coupon=$_POST['coupon'];
$referer=$_POST['referer'];
$password1=md5($_POST['password_1']); 
$password2=md5($_POST['password_2']);
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }
$sql="INSERT INTO  users(FullName,EmailId,ContactNo,Username,Coupon,Password,Refer) VALUES(:fullname,:email,:phone,:username,:coupon,:password_1,:referer,)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':coupon',$coupon,PDO::PARAM_STR);
$query->bindParam(':password_1',$password,PDO::PARAM_STR);
$query->bindParam(':referer',$referer,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>



?>
<!DOCTYPE html>
<html>

<head>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
        <title>SignUp</title>
    </head>

<body>


    <form method="post" action="register.php">

        <div class="container">
            <div class="mb-5">

                <div class="header">
                    <h2>Welcome!! Sign Up</h2>
                </div>


                <input type="text" placeholder="Full Name" class="form-control mb-3" name="fullname"
                    value="<?php echo $fullname; ?>">


                <input type="tel" placeholder="phone number" class="form-control mb-3" name="phone"
                    value="<?php echo $phone; ?>">

                <input type="text" placeholder="Username" class="form-control mb-3" name="username"
                    value="<?php echo $username; ?>">

                <input type="text" placeholder="Email" class="form-control mb-3" name="email"
                    value="<?php echo $email; ?>">

                <input type="password" placeholder="Password" class="form-control mb-3" name="password_1">

                <input type="password" placeholder="Re Type Password" class="form-control mb-3" name="password_2">

                <input type="text" placeholder="Coupon" class="form-control mb-3" name="coupon"
                    value="<?php echo $coupon; ?>" >

                <input type="text" placeholder="Referral" class="form-control mb-3" name="refer"
                    value="<?php echo $refer; ?>">

                <button type="submit" class="btn btn-primary" name="reg_user">Sign Up</button>

                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
                <?php include('errors.php'); ?>
            </div>
        </div>
        </div>
    </form>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>