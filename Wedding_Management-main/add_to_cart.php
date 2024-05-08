<?php
include('action.php');
if (!isset($_SESSION['uname'])) {
    header('location:index.php');
}

if (isset($_POST['make_purchase'])) {
    if (isset($_SESSION['urname'])) {
        $name = $_SESSION['urname'];
        // Delete wedding registration
        $sql_delete = "DELETE FROM registration WHERE name='$name'";
        mysqli_query($con, $sql_delete);
    }
    // Your payment processing logic here
    $total_price = 0; // Replace this with your actual total price
    // Display success message
    echo "<script>alert('Payment successful.');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Wedding Party</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/wed3.jpg" rel="icon">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="#das">
        <h2 class="text-center">Payment</h2>
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
                            echo "<h2 class='text-center'>You have no wedding registration yet</h2>";
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
                         <div class='col-md-1'><div class='btn btn-outline-danger del' rid='$reg_id'>Cancel</div></div>
                       </div><br>";
                        }
                    }
                    ?>
                </div>
                <div class="card-footer">
                    <form method="post">
                        <button type="submit" name="make_purchase" class="btn btn-primary">Make Purchase</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>