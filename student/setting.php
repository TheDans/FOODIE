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
  $studIcNo = $row['studIcNo'];
  $studGender = $row['studGender'];
  $studPhoneNo = $row['studPhoneNo'];
  $matricNo = $row['MatricNo'];
  $studEmail = $row['studEmail'];
  $user_image = $row['user_image'];
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
              <img 
                src="/FOODIE/images/studentImages/<?php echo $user_image; ?>" 
                alt="Profile Picture"
                onerror="this.src='/FOODIE/images/studentImages/default_student.png';"
              />
            </div>

            <div class="profile-info">
              <div class="title-with-icon">
                <h1 class="title">Account Info</h1>
                <a href="/FOODIE/student/settingEdit.php?studentID=<?php echo $studID; ?>">
                  <img src="/FOODIE/images/edit_icon.png" alt="Edit" class="icon-btn" />
                </a>
              </div>

              
              <!-- STUDENT ID -->
              <div class="info-row">
                <h1>Student ID:</h1>
                <p><?php echo $studID; ?></p>
              </div>

              <!--MATRIC NUMBER-->
              <div class="info-row">
                <h1>Matric No:</h1>
                <p><?php echo $matricNo; ?></p>
              </div>

              <!--STUDENT NAME-->
              <div class="info-row">
                <h1>Name:</h1>
                <p><?php echo $studName; ?></p>
              </div>



              <!--STUDENT EMAIL-->
              <div class="info-row">
                <h1>Email:</h1>
                <p><?php echo $studEmail; ?></p>
              </div>

              <!--IC NUMBER-->
              <div class="info-row">
                <h1>Ic No:</h1>
                <p><?php echo $studIcNo; ?></p>
              </div>

              <!--PHONE NUMBER-->
              <div class="info-row">
                <h1>Phone No:</h1>
                <p><?php echo $studPhoneNo; ?></p>
              </div>

               <!--STUDENT GENDER-->
              <div class="info-row">
                <h1>Gender:</h1>
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

              <!--ROLE-->
              <div class="info-row">
                <h1>Role:</h1>
                <p>Student</p>
              </div>

              <!--PASSWORD-->
              <div class="info-row">
                <h1>Password:</h1>
                <p>********</p>
              </div>

            </div>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>