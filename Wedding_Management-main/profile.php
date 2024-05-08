<?php
include('action.php');
if (!isset($_SESSION['uname'])) {
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

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top"></a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="#home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/registration.php">Wedding Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#das"><?php echo $_SESSION['urname']; ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="registration/logout.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
  <div id="home" class="intro route bg-image" style="background-image: url(img/wed3.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4"> </h1>
          <p class="intro-subtitle"><span class="text-slider-items">Find your best Match,Make Your Wedding Memorable,Hire Us. Rest on Us</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->
  <div id="#das">
    <h2 class="text-center">Wedding Details</h2>
    <br>
    <div class="container-fliud">
      <div class="card">
        <div class="card-header bg-info">
          <div class="row">
            <div class="col-md-2"> Name</div>
            <div class="col-md-2">Groom Name</div>
            <div class="col-md-2">Bride Name</div>
            <div class="col-md-2">Wedding Date</div>
            <div class="col-md-1">Person </div>
            <div class="col-md-2">Total Cost</div>
            <div class="col-md-1">Action</div>
          </div>
        </div>
        <div class="card-body">
          <?php
          if (isset($_SESSION['uname'])) {
            $name = $_SESSION['urname'];
            $sql = "SELECT * FROM registration WHERE name='$name'";
            $run = mysqli_query($con, $sql);
            if (mysqli_num_rows($run) == 0) {
              echo "<h2 class='text-center'>Wedding Not Register Yet</h2>";
            } else {
              $row = mysqli_fetch_array($run);
              $reg_id = $row['reg_id'];
              $name = $row['name'];
              $dname = $row['dname'];
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
              $sql = "SELECT * FROM catering WHERE cid='$cid' ";
              $run = mysqli_query($con, $sql);
              $price1 = 0;
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price1 = $row['price'];
              }
              $sql = "SELECT * FROM theme WHERE tid='$tid' ";
              $run = mysqli_query($con, $sql);
              $price2 = 0;
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price2 = $row['price'];
              }
              $price3 = 0;
              $sql = "SELECT * FROM music WHERE mid='$mid' ";
              $run = mysqli_query($con, $sql);
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price3 = $row['price'];
              }
              $price4 = 0;
              $sql = "SELECT * FROM photoshop WHERE pid='$pid' ";
              $run = mysqli_query($con, $sql);
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price4 = $row['price'];
              }

              $sql = "SELECT * FROM decoration WHERE did='$did' ";
              $run = mysqli_query($con, $sql);
              $price5 = 0;
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price5 = $row['price'];
              }

              $sql = "SELECT * FROM venue WHERE vid='$vid' ";
              $run = mysqli_query($con, $sql);
              $price6 = 0;
              if (mysqli_num_rows($run) != 0) {
                $row = mysqli_fetch_array($run);
                $price6 = $row['price'];
              }
              $sum = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + $s;
              echo " <div class='row'>
                        <div class='col-md-2'><h5>$name</h5></div>
                        <div class='col-md-2'><h5>$dname</h5></div>
                        <div class='col-md-2'><h5>$dlname</h5></div>
                        <div class='col-md-2'><h5>$date</h5></div>
                        <div class='col-md-1'><h5>$pno</h5> </div>
                        <div class='col-md-2'><h5>$sum</h5></div>
                         <div class='col-md-1'><div class='btn btn-outline-danger del' rid='$reg_id'>Cancle</div></div>
                       </div><br>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card mt-4">
      <div class="card-header bg-info">
        <h3 class="text-center">Wedding Details</h3>
      </div>

      <?php
      if (isset($_SESSION['uname'])) {
        $name = $_SESSION['urname'];
        $sql = "SELECT * FROM registration WHERE name='$name'";
        $run = mysqli_query($con, $sql);
        if (mysqli_num_rows($run) == 0) {
          echo "<h2 class='text-center'>Wedding Not Register Yet</h2>";
        } else {
          $row = mysqli_fetch_array($run);
          $reg_id = $row['reg_id'];
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
          $sql = "SELECT * FROM catering WHERE cid='$cid' ";
          $run = mysqli_query($con, $sql);
          $price1 = 0;
          $cname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price1 = $row['price'];
            $cname = $row['name'];
          }

          $sql = "SELECT * FROM theme WHERE tid='$tid' ";
          $run = mysqli_query($con, $sql);
          $price2 = 0;
          $tname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price2 = $row['price'];
            $tname = $row['name'];
          }

          $sql = "SELECT * FROM music WHERE mid='$mid' ";
          $run = mysqli_query($con, $sql);
          $price3 = 0;
          $mname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price3 = $row['price'];
            $mname = $row['name'];
          }

          $sql = "SELECT * FROM photoshop WHERE pid='$pid' ";
          $run = mysqli_query($con, $sql);
          $price4 = 0;
          $pname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price4 = $row['price'];
            $pname = $row['name'];
          }

          $sql = "SELECT * FROM decoration WHERE did='$did' ";
          $run = mysqli_query($con, $sql);
          $price5 = 0;
          $dname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price5 = $row['price'];
            $dname = $row['name'];
          }
          $sql = "SELECT * FROM venue WHERE vid='$vid' ";
          $run = mysqli_query($con, $sql);
          $price6 = 0;
          $vname = '';
          if (mysqli_num_rows($run) != 0) {
            $row = mysqli_fetch_array($run);
            $price6 = $row['price'];
            $vname = $row['name'];
          }
          $sum = $price1 + $price2 + $price3 + $price4 + $price5 + $price6 + $s;
          echo " <div class='card-body'>
      <h4 class='text-center'>Wedding Couple Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Groom Name :</h5>
          <h5>Bride Name :</h5>
          <h5>Wedding Date :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$d1name</h5>
          <h5>$dlname</h5>
          <h5>$date</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Catering Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Catering Name :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$cname</h5>
          <h5>$price1</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Decoration Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Decoration  :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$dname</h5>
          <h5>$price5</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Music Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Music Style :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$mname</h5>
          <h5>$price3</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Venue Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Venue :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$vname</h5>
          <h5>$price6</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Theme Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Theme Type :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$tname</h5>
          <h5>$price2</h5>
        </div>
      </div><br>
      <h4 class='text-center'>Photoshop Details</h4><hr>
      <div class='row'>
        <div class='col-md-6'>
          <h5>Photo :</h5>
          <h5>Price :</h5>
        </div>
        <div class='col-md-6'>
          <h5>$pname</h5>
          <h5>$price4</h5>
        </div>
      </div>
    </div>
    <div class='card-footer'>
      <h3 class='text-center'>Total Fare :$sum </h3>
    </div>";
        }
      }
      ?>
      <!--/ add to cart /-->
      <!-- Inside the card-footer div -->
      <div class='card-footer'>
        <h3 class='text-center'></h3>
        <a href='add_to_cart.php' class='btn btn-primary'>Add to Cart</a>
      </div>



    </div>
  </div>
  <!--/ Section Services Star /-->
  <section id="service" class="services-mf route mt-4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Select Services
            </h3>
            <p class="subtitle-a">

            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <a href="venue.php">
            <div class="service-box" style="background-image:url(img/venue.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Venue</b></h2>
                <p class="s-description text-center text-white"><b>
                  </b>
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="theme.php">
            <div class="service-box" style="background-image:url(img/theme.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Theme</b></h2>
                <p class="s-description text-center text-white"><b>
                  </b>
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="cat.php">
            <div class="service-box" style="background-image:url(img/cat.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Catering</b></h2>
                <p class="s-description text-center text-white"><b>
                  </b>
                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="music.php">
            <div class="service-box" style="background-image:url(img/dj.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Music</b></h2>
                <p class="s-description text-center text-white"><b>
                  </b>
                </p>
              </div>
            </div>
        </div></a>
        <div class="col-md-4">
          <a href="photo.php">
            <div class="service-box" style="background-image:url(img/photo.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Photoshop</b></h2>
                <p class="s-description text-center text-white"><b>

                </p>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="decoration.php">
            <div class="service-box" style="background-image:url(img/decoration.jpg); background-size: cover;">
              <div class="service-ico">
              </div>
              <div class="service-content ">
                <h2 class="s-title text-white"> <b>Decoration</b></h2>
                <p class="s-description text-center text-white"><b></b>

                </p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!--/ Section Services End /-->
  <!--/ Section Services End /-->
  <section id="work" class="portfolio-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Portfolio
            </h3>
            <p class="subtitle-a">

            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img1.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img1.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img2.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img2.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img3.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img3.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img4.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img4.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img5.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img5.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="work-box">
            <a href="img/img6.jpg" data-lightbox="gallery-mf">
              <div class="work-img">
                <img src="img/img6.jpg" alt="" class="img-fluid">
              </div>
              <div class="work-content">
                <div class="row">
                  <div class="col-sm-8">
                    <h2 class="w-title">Groom and Bride name</h2>
                    <div class="w-more">
                      <span class="w-ctegory">Family Name</span> / <span class="w-date">Date</span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="w-like">
                      <span class="ion-ios-plus-outline"></span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>
  <div class="section-counter paralax-mf bg-image" style="background-image: url(img/wed.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-checkmark-round"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">450</p>
              <span class="counter-text">WORKS COMPLETED</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-calendar-outline"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">3</p>
              <span class="counter-text">YEARS OF EXPERIENCE</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ios-people"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">550</p>
              <span class="counter-text">TOTAL CLIENTS</span>
            </div>
          </div>
        </div>
        <div class="col-sm-3 col-lg-3">
          <div class="counter-box pt-4 pt-md-0">
            <div class="counter-ico">
              <span class="ico-circle"><i class="ion-ribbon-a"></i></span>
            </div>
            <div class="counter-num">
              <p class="counter">36</p>
              <span class="counter-text">AWARD WON</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(img/wed2.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-md-6">
                  <div class="title-box-2 pt-4 pt-md-0">
                    <h5 class="title-left">
                      Get in Touch
                    </h5>
                  </div>
                  <div class="more-info">
                    <p class="lead">
                      Mirpur-2 city-market headquarter
                    </p>
                    <ul class="list-ico">
                      <li><span class="ion-ios-location"></span>10/8 love road mirpur-2 Dhaka</li>
                      <li><span class="ion-ios-telephone"></span> +8801764408500</li>
                      <li><span class="ion-email"></span> wedding123@gmail.com</li>
                    </ul>
                  </div>
                  <div class="socials">
                    <ul>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-facebook"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-instagram"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-twitter"></i></span></a></li>
                      <li><a href=""><span class="ico-circle"><i class="ion-social-pinterest"></i></span></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong> Wedding Planner</strong>. All Rights Reserved</p>
              <div class="credits">

                Designed by <a href="#">Tarun Chandra Das</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->


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