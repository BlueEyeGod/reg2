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
    <link rel="stylesheet" href="indexstyles.css">

    <title>How It works</title>
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
                    <a class="navbar-brand" href="Index1.php"><img src="Cashclip1.png"></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="Index1.php">Home</a>
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
            <h1> HOW IT WORKS </h1>

            <p>CASHCLIP provides people with opportunity to take advantage of the internet and turn our everyday social
                media into a tool for making passive income.</p>
            <hr>

            <h1>WHO CAN BE A MEMBER ON CASHCLIP?</h1>
            <p>Practically anyone can be a member on CASHCLIP as all you need is an internet enabled device to enable
                you
                perform your daily tasks on your website</p>
            <hr>

            <h1>REGISTRATION FEE</h1>
            You need a token of #1500 only to get onboard and start earning on CASHCLIP
            <hr>

            <h1>HOW DO I SIGN UP ?</h1>
            <p>Signup is pretty easy. Follow the step below to get started.</p>
            <ul>
                <li>On the CASHCLIP website click on the BUY CODE.</li>
                <li>Contact one of the coupon vendors to get a coupon code</li>
                <li>Click on the Sign up button.</li>
                <li>Fill in each field with the appropriate details </li>
                <li>Then login with email or username and password.</li>
            </ul>
            <hr>
            <h1>STEPS ON HOW TO SHARE SPONSORED POST</h1>
            <ul>
                <li>Scroll down on your dashboard you'll see sponsored post for the day I.e sponsored post for 1th of
                    August
                    2022</li>
                <li>Click on SHARE LINK</li>
                <li>You'll be redirected to Whatsapp</li>
                <li>Forward the link And Click on "My Status"</li>
                <li>5.Finally go back to the sponsored post on the site and click the click to earn button.</li>
            </ul>
            <hr>

            <h1>HOW YOU EARN</h1>
            <p>Registration fee #1500</p>
            <ul>
                <li> Welcome bonus #1000 + 200MB DATA</li>
                <li>Referral bonus #800</li>
                <li>Daily login bonus #50</li>
                <li> Sharing of Sponsored post #200</li>

            </ul>
            <hr>

            <h1>HOW DO I REGISTER MY PROSPECTS?</h1>
            <p>Contact any of the code distributors on the site to get registration code, then go to your
                dashboard/profile,
                copy your referral link, logout and paste it in your browser, once it's loaded clear your username and
                password then input that of your prospect, fill in other details and click on register.</p>
            <hr>

            <h1>CAN I GET PAID WITHOUT REFERRAL?</h1>
            <p>Referral is completely optional on CASHCLIP</p>
            <hr>
            <h1>CASHEARNERS OPTIONS</h1>

            <h1>Withdrawal of earnings via local bank account</h1>

            <p>Withdrawal process for Activity Earners are as follows 6,500 Cashclip Activity Points (Cashpoints or CP)
                anytime they earn up to 6,500 Caps they are eligible to withdraw. Point are been converted by 0.4 during
                withdrawal and #100 charged for bank transaction.

                There's no Withdrawal Date For Affiliate Earners also known as CashEarners (CE) on CASHCLIP and no
                converting for Affiliate Earners.. You get paid exerctly what you have earned. E.g #15,000 = #15,000 ✍️
                Withdrawal is open 24/7 and you get paid in less than 24hrs after withdrawal.

                Extra bonuses for a certain amount of earnings withdrawn weekly. ✌️

                Minimum withdrawal

                6500 Cashpoints for non Refferal

                Withdrawal is made Every 15th and 25th of the month Between 6am - 9am

                Cash Earnings/Refferal Earnings

                #800

                Withdrawal is 24/7 Everyday and Anytime</p>
        </div>
    </div>













    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>


    <div class="bottom-contain">
        <section class="newsletter">
            <div class="newsletter-inner">
                <div class="container">
                    <h3>Follow us on facebook</h3>
                    <a href="#" class="btn1 btn-inverse">Follow</a>
                </div>
            </div>
        </section>
        <div class="site-footer-container">
            <footer class="site-footer">
                <div class="site-footer-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Cashclick</h3>
                            </div>
                            <div class="col-md-6">
                                <h3>Footer Right</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <?php endif ?>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>