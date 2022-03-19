<?php 
    include('server.php');
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
    <?php echo display_error(); ?>  
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