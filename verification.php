<?php 
 // session_start(); 

  ///if (!isset($_SESSION['username'])) {
  //	$_SESSION['msg'] = "You must log in first";
  //	header('location: index.php');
 /// }
 // if (isset($_GET['logout'])) {
  //	session_destroy();
  //	unset($_SESSION['username']);
  //	header("location: index.php");
  }
  include('server.php'); 
?>
<!DOCTYPE html> 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="indexstyles.css">

    <title>Home</title>
</head>

<body>



    <div class="content">
       
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #13c480">
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
                            <a class="nav-link" aria-current="page" href="adminpanel.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Userinfo.php">Users Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="verification.php">Verify Users</a>
                        </li>


                    </ul>
                </div>
                <form class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <li class="nav-item">
                          
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">fullname</th>
                    <th scope="col">phone</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                    <th scope="col">action</th>
                </tr>
            </thead>



            <?php

  $query = "SELECT * FROM users WHERE status = 'pending' ORDER BY id ASC";
  $result = mysqli_query($db, $query);
  while($row = mysqli_fetch_array($result)){

  ?>

            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['fullname'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['username'];?></td>
                <td><?php echo $row['email'];?></td>


                <td>
                    <form action="verification.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id'];?>"/>
                        <input type="submit" name="approve" value="approve"/>
                        <input type="submit" name="deny" value="deny"/>
                    </form>
                </td>
            <tr>
        </table>

        <?php
                }
        ?>

        <?php

            if(isset($_POST['approve'])){
                $id = $_POST['id'];

                $user_check_query = "UPDATE users SET STATUS = 'approved' WHERE id = '$id'";
                $result = mysqli_query($db, $user_check_query);

                echo "Account Has Been Approved";
                header('location: verifycoupon.php');
            }


            if(isset($_POST['deny'])){
                $id = $_POST['id'];

                $user_check_query = "DELETE FROM users WHERE id = '$id'";
                $result = mysqli_query($db, $user_check_query);

                echo "User denied!!!";
                header('location: verification.php');
            }

        ?>












        <div class="bottom-contain">
            <section class="newsletter">
                <div class="newsletter-inner">
                    <div class="container">
                        <h3>Follow us on facebook</h3>
                        <a href="https://www.facebook.com/Cashclip-100114982615485/" class="btn1 btn-inverse">Follow</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>