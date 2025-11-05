<?php
  session_start();
  include("studconnection.php");

  if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
  {
      header("Location:/FOODIE/landing-page/index.html");
  }

  $studID = $_SESSION['studID'];
  $sql = "SELECT * FROM students WHERE studID='$studID'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $studID = $row['studID'];
  $studName = $row['studName'];
  $studGender = $row['studGender'];
  $studPhoneNo = $row['studPhoneNo'];
  $matricNo = $row['MatricNo'];
  $studIcNo = $row['studIcNo'];
  $studEmail = $row['studEmail'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="setting.css" />
    <title>FOODIE - Settings</title>
  </head>

  <body>
        <div class="container">
      <aside class="sidebar">
        <div class="logo-container">
          <div class="logo">FOODIE.</div>
        </div>
        <nav class="nav-menu">
          <a href="home.php" class="nav-item active">HOME</a>
          <a href="search.php" class="nav-item">SEARCH</a>
          <a href="receipts.html" class="nav-item">RECEIPTS</a>
          <a href="cart.html" class="nav-item">CART, DORM & DATES</a>
          <a href="adminContact.php" class="nav-item">ADMIN CONTACT</a>
          <a href="" class="nav-item active">SETTINGS</a>
          <a href="logout.php" class="nav-item">LOG OUT</a>
        </nav>
      </aside>

      <!-- MAIN CONTENT -->
      <main class = "main-content">
        <header class="header-title">SETTINGS</header>

        <!-- User profile card -->
        <section class="profile-card-container">
          <div class="profile-card">
            <div class="profile-picture">
              <img
                src="https://placehold.co/100x100/7b002c/ffffff?text=User"
                alt="User Profile Picture"
              />
            </div>
            <div class="profile-info">
              <p class="id">Student ID:</p>
              <p class="studID"><?php echo $studID; ?></p>

              <div class="info-row">
                <h1>Username:</h1>
                <p><?php echo $studName; ?></p>
              </div>
              <div class="info-row">
                <h1>Email:</h1>
                <p><?php echo $studEmail; ?></p>
              </div>

              <h1>Phone No: </h1>
              <p><?php echo $studPhoneNo; ?></p>

              <h1>Matric No: </h1>
              <p><?php echo $matricNo; ?></p>

              <h1>Password: </h1>
              <p>********</p>

              <p class="role">Student</p>
              <p class="gender">Male</p>
            </div>
          </div>
        </section>
      </main>

  </body>

</html>