<?php
  session_start();
  include("studconnection.php");

  if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
  {
    header("Location:/FOODIE/landing-page/index.html");
    exit();
  }

  $studID = $_SESSION['studID'];

  $sql = "SELECT orderID FROM orders WHERE studID='$studID' ORDER BY orderID DESC LIMIT 1";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0)
  {
    $row = mysqli_fetch_assoc($result);
    $orderID = $row['orderID'];
  }
  else
  {
    $orderID = "No order found";
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="receiptsStyle.css" />
    <title>FOODIE - Receipts</title>
  </head>

  <body>
    <div class="container">
      <aside class="sidebar">
        <div class="logo-container">
          <div class="logo">FOODIE.</div>
        </div>
        <nav class="nav-menu">
          <a href="home.php" class="nav-item">HOME</a>
          <a href="search.php" class="nav-item">SEARCH</a>
          <a href="" class="nav-item active">RECEIPTS</a>
          <a href="cart.php" class="nav-item">CART, DORM & DATES</a>
          <a href="adminContact.php" class="nav-item">ADMIN CONTACT</a>
          <a href="setting.php" class="nav-item">SETTINGS</a>
          <a href="logout.php" class="nav-item">LOG OUT</a>
        </nav>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="main-content">
        <header class="header-title">RECEIPTS</header>

        <section class="info-section">
          <h3 class="section-title">RECEIPTS THROUGH EMAIL</h3>
          <div class="info-grid">
            <span class="order-id">YOUR ORDER ID: <?php echo $orderID; ?></span>
            <h3>Checkout first to have your receipts sent to your email</h3>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
