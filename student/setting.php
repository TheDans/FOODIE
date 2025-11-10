<?php
  session_start();
  include("studconnection.php");

  if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1) {
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
  $studEmail = $row['studEmail'];
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="setting.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>FOODIE - Settings</title>
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
          <a href="receipts.php" class="nav-item">RECEIPTS</a>
          <a href="cart.php" class="nav-item">CART, DORM & DATES</a>
          <a href="adminContact.php" class="nav-item">ADMIN CONTACT</a>
          <a href="" class="nav-item active">SETTINGS</a>
          <a href="logout.php" class="nav-item">LOG OUT</a>
        </nav>
      </aside>

      <!-- MAIN CONTENT -->
      <main class="main-content">
        <header class="header-title">SETTINGS</header>

        <!-- User profile card -->
        <section class="profile-card-container">
          <div class="profile-card">
            <div class="profile-picture">
               <img src="https://placehold.co/100x100/7b002c/ffffff?text=User"/>
            </div>

            <div class="profile-info">
              <h1 class="title">Account Info</h1>
              
              <!-- STUDENT ID -->
              <div class="non-editable">
                <h1>Student ID:</h1>
                <p><?php echo $studID; ?></p>
              </div>

              <!-- NAME -->
              <div class="non-editable">
                <h1>Name:</h1>
                <p><?php echo $studName; ?></p>
              </div>

              <!-- EMAIL -->
              <div class="info-row">
                <h1>Email:</h1>
                <p><?php echo $studEmail; ?></p>
                <button id="editEmail">Edit</button>
              </div>

              <!-- PHONE NO -->
              <div class="info-row">
                <h1>Phone No:</h1>
                <p><?php echo $studPhoneNo; ?></p>
                <button id="editPhone">Edit</button>
              </div>

              <!-- MATRIC NO -->
              <div class="non-editable">
                <h1>Matric No:</h1>
                <p><?php echo $matricNo; ?></p>
              </div>

              <!-- PASSWORD -->
              <div class="info-row">
                <h1>Password:</h1>
                <p>********</p>
                <button id="editPassword">Edit</button>
              </div>

              <p class="role">Student</p>
              <p class="gender">
                <?php 
                  if($row['studGender'] == 'M')
                    {
                      echo "Male";
                    }
                  else 
                  {
                    echo "Female";
                  }
                ?>
              </p>
            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>