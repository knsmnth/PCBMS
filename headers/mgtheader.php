<!DOCTYPE html>
<html>
<?php
session_start();
date_default_timezone_set('UTC');
date_default_timezone_set("Asia/Manila");

if (!isset($_SESSION['username']) && $_SESSION['role'] != 'Manager') {
  header("location: ../");
} else {
  $fullname = $_SESSION['lname'] . ", " .
    $_SESSION['fname'] . " " .
    $_SESSION['mname'] . " - " . $_SESSION['role'];
  $user = $_SESSION['username'];
}
?>

<head>
  <link rel='icon' href='../images/vsulogo.ico' type='image/x-icon' />
  <title>Store Management Web Module</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet" />
  <script type="text/javascript" src="../js/setDateTime.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class class="navbar-brand mr-auto"> Store Management</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item homepage">
          <a class="nav-link" href="../manage/index.php">Home Page</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="receiveDeliveryDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Receive Delivery
          </a>
          <div class="dropdown-menu" aria-labelledby="receiveDeliveryDropdown">
            <a class="dropdown-item" href="../supplier/index.php">Supplier Update</a>
            <a class="dropdown-item" href="../product/index.php">Product Update</a>
            <a class="dropdown-item" href="#">Product Delivery</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="orderProductsDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Order Products
          </a>
          <div class="dropdown-menu" aria-labelledby="orderProductsDropdown">
            <a class="dropdown-item" href="#">Purchase Order Manage</a>
            <a class="dropdown-item" href="#">Expired Products Manage</a>
          </div>
        </li>
        <li class="nav-item logout">
          <a class="nav-link" href="../login/Signout.php">Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- <marquee> -->
  <div class="ml-3 mr-3">
    <div class="row justify-content-between NameTime">
      <div class="col-auto">
        <?php echo $fullname ?>
      </div>
      <div class="col-auto">
        <div id="timer"></div>
      </div>
    </div>
  </div>
  <!-- </marquee> -->