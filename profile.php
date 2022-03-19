<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: index.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: index.php");
  }
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">

    <title>Profile</title>
</head>

<body>

    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success">
            <h3>
                <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
            </h3>
        </div>
        <?php endif ?>

        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:
      #13c480">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index1.php"><img src="Cashclip1.png"></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index1.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="getcoupon.php">Get Coupon Code</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="verifycoupon.php">Verify Coupon</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="How it works.php">About</a>
                        </li>

                    </ul>
                </div>
                <form class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <li class="nav-item">
                            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
                        </li>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="index.php?logout='1'" class="btn btn-primary" role="button"
                                style="color: white;">logout</a>
                        </li>
                        </li>

                    </ul>
                </form>
            </div>
        </nav>

        <div class="container">
        <input type="text" placeholder="Full Name" class="form-control mb-3" name="fullname">


                <input type="tel" placeholder="phone number" class="form-control mb-3" name="phone">

                <input type="text" placeholder="Username" class="form-control mb-3" name="username">

                <input type="text" placeholder="Email" class="form-control mb-3" name="email">

                <input type="text" placeholder="Bank Name" class="form-control mb-3" name="bank name" >

                <input type="tel" placeholder="Account Number" class="form-control mb-3" name="account number">

                <input type="text" placeholder="Account Name" class="form-control mb-3" name="acount name">

                <input type="text" placeholder="Facebook" class="form-control mb-3" name="facebook">

                <button type="submit" class="btn btn-primary" name="save">Save</button>



        </div>



        <div class="bottom-contain">
                <section class="newsletter">
                    <div class="newsletter-inner">
                        <div class="container">
                            <h3>Follow us on facebook</h3>
                            <a href="https://www.facebook.com/Cashclip-100114982615485/"
                                class="btn1 btn-inverse">Follow</a>
                        </div>
                    </div>
                </section>
                <div class="site-footer-container">
                    <footer class="site-footer">
                        <div class="site-footer-inner">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">

                                        <p class="pr 2 text white 2">
                                            Cashclip #1 Affiliate Marketing Website. Earn money while doing your daily
                                            jobs
                                        </p>
                                        
                                    </div>
                                    <div class="col-lg-3 col-xs-12 links">
                                        <h3 class="mt-lg-0 mt-sm-3">Contacts</h3>
                                        <ul>
                                            <li>Cashclip.com.ng</li>
                                            <li>Cashclippreview@gmail.com</li>
                                        </ul>
                                    </div>
                                    <div class="copyright">
                                        &copy; Copyright <strong><span>Cashclip</span></strong>. All Rights Reserved
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>


            <?php endif ?>
        </div>


           <!-- Bootstrap Bundle with Popper -->
 <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>