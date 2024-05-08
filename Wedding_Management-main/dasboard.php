<?php
include('action.php');
if (!isset($_SESSION['name'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Wedding Party</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/wed3.jpg" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">

 

  <!-- Nav Start -->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">Wedding Planner</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="registration/venue.php">Venue</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/theme.php">Theme</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/music.php">Music</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/catering.php">Catering</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/photoshop.php">PhotoShop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/decoration.php">Decoration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="checkbooking.php">Check Booking</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Nav End -->

  <br>
  <br>
  <br>
  <br>

  <h2 class="text-center mt-5">Registered Wedding</h2>
  <br>
  <div class="container mt-4">
    <div class="card">
      <div class="card-header bg-info">
        <div class="row">
          <div class="col-md-2">Name</div>
          <div class="col-md-2">Groom Name</div>
          <div class="col-md-2">Bride Name</div>
          <div class="col-md-2">Wedding Date</div>
          <div class="col-md-2">Person </div>
          <div class="col-md-2">Total Cost</div>
        </div>
      </div>
      <div class="card-body">
        <?php
        if (isset($_SESSION['name'])) {
          $sql = "SELECT * FROM registration";
          $run = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_array($run)) {
            $name = $row['name'];
            $d1name = $row['dname'];
            $dlname = $row['dlname'];
            $date = $row['wdate'];
            $pno = $row['pno'];
            $s = $pno * 100;
            $vid = $row['vid'];
            $tid = $row['tid'];
            $did = $row['did'];
            $pid = $row['pid'];
            $cid = $row['cid'];
            $mid = $row['mid'];
            $sql1 = "SELECT * FROM catering WHERE cid='$cid' ";
            $run1 = mysqli_query($con, $sql1);
            $price1 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price1 = $row['price'];
              $cname = $row['name'];
            }
            $sql1 = "SELECT * FROM theme WHERE tid='$tid' ";
            $run1 = mysqli_query($con, $sql1);
            $price2 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price2 = $row['price'];
              $tname = $row['name'];
            }
            $sql1 = "SELECT * FROM music WHERE mid='$mid' ";
            $run1 = mysqli_query($con, $sql1);
            $price3 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price3 = $row['price'];
              $mname = $row['name'];
            }
            $sql1 = "SELECT * FROM photoshop WHERE pid='$pid' ";
            $run1 = mysqli_query($con, $sql1);
            $price4 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price4 = $row['price'];
              $pname = $row['name'];
            }

            $sql1 = "SELECT * FROM decoration WHERE did='$did' ";
            $run1 = mysqli_query($con, $sql1);
            $price5 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price5 = $row['price'];
              $dname = $row['name'];
            }
            $sql1 = "SELECT * FROM venue WHERE vid='$vid' ";
            $run1 = mysqli_query($con, $sql1);
            $price6 = 0;
            if (mysqli_num_rows($run1) != 0) {
              $row = mysqli_fetch_array($run1);
              $price6 = $row['price'];
              $vname = $row['name'];
            }
            $sum = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + $s;
            echo " <div class='row'>
                        <div class='col-md-2'><h5>$name</h5></div>
                        <div class='col-md-2'><h5>$d1name</h5></div>
                        <div class='col-md-2'><h5>$dlname</h5></div>
                        <div class='col-md-2'><h5>$date</h5></div>
                        <div class='col-md-2'><h5>$pno</h5> </div>
                        <div class='col-md-2'><h5>$sum</h5></div>
                       </div><br>";
          }
        }
        ?>
      </div>
    </div>
  </div>




  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/popper/popper.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/counterup/jquery.waypoints.min.js"></script>
  <script src="lib/counterup/jquery.counterup.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>


</body>

</html>