<?php 
include('server.php')

?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <title>Login</title>
  </head>
<body>

	 
  <form method="post" action="login.php">
    <?php echo display_error(); ?>
  	
	  <div class="container">
            <div class="mb-5" id="signup">
                <h3 class="mb-3"> LOGIN</h3>
                
                <input type="text" placeholder="USERNAME" class="form-control mb-3" name="username">
                
                <input type="password" placeholder="PASSWORD" class="form-control mb-3" name="password">
                
  
                <button type="submit" id="sub_btn" class="btn btn-primary" name="login_user">Login</button>
                <a href="register.php" class="badge bg-secondary py-1 w-100">Wanna create an account?</a>
                <?php include('errors.php'); ?>
              </div>
        </div>
    </form>
 
</body>
</html>