<?php
session_start();
include("studconnection.php");

if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
    header("Location:/FOODIE/landing-page/index.html");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="result.css" />
  </head>

  <!--<script>alert('Notice! Once selecting product, student must NOT log out until done checkout or cancel the order.')</script>-->
  <body>
    <div class="container">
      <aside class="sidebar">
        <div class="logo-container">  
          <div class="logo">FOODIE.</div>
        </div>
        <nav class="nav-menu">
          <a href="home.php" class="nav-item">HOME</a>
          <a href="#" class="nav-item">SEARCH</a>
          <a href="#" class="nav-item">RECEIPTS</a>
          <a href="#" class="nav-item">CART, DORM &amp; DATES</a>
          <a href="adminContact.php" class="nav-item active">STAFF CONTACT</a>
          <a href="logout.php" class="nav-item">LOG OUT</a>
        </nav>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="main-content">
        <header class="header-title">Search</header>
  
        <!-- personal information section-->
        <section class="info-section"> 
          <h3 class="section-title">YOUR ORDER ID: <?php echo $_SESSION['orderID']; ?></h3>
            <div class="info-grid">
            <div class="info-item">
              <span class="info-label">CHOOSE TYPE</span>
              <span class="info-value">
                <?php 
						$typeID = $_GET['typeID'];
							
						if ($typeID == "PT001")
							echo "Instants";
						else if ($typeID == "PT002")
							echo "Sweets";
						else
							echo "Biscuits";
					?>
              </span>
            </div>
            <div class="info-item">
              <span class="info-label">SORT BY</span>
              <span class="info-value"><?php echo $_GET["sortBy"]; ?></span>
            </div>
            <div class="info-item">
              <span class="info-label">KEYWORD</span>
              <span class="info-value">
                <?php
						$keywords = $_GET['keyword'];
									
						if ($keywords == "")
							echo "All";
						else
							echo $keywords; 
					?>
                </span>
            </div>
          </div>
            <a class ="back" href="searchprod.php">Back</a>
        </section>
        <div class="product-grid"></div>
        <div class="product-section"></div>
      </main>
    </div>
  </body>
</html>
