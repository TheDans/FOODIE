<?php
session_start();
include("studconnection.php");

if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
    header("Location: /FOODIE/landing-page/index.html");
}

$studentId = $_GET["studentID"];

$data = mysqli_query($conn, "SELECT * FROM students WHERE studentID='$studentId'"); // select query
$row = mysqli_fetch_assoc($data);

if(isset($_POST["edit"])) {
    $studentName = $_POST["studentName"];
    $studentGender = $_POST["studentGender"];
    $studentEmail = $_POST["studentEmail"];
    $studentPhone = $_POST["studentPhoneNo"];
    $username = $_POST["username"];

    $update = "UPDATE students 
               SET studentName='$studentName', studentGender='$studentGender', 
                   studentEmail='$studentEmail', studentPhoneNo='$studentPhone', username='$username' 
               WHERE studentID='$studentId'";
    
    $run = mysqli_query($conn, $update);

    if($run) {
        echo "<script language='javascript'>
        alert('Details of student have been updated successfully.');
        window.location='/FOODIE/staff/studentSuperEditStudent.php';
        </script>";
    } else {
        echo "<script language='javascript'>
        alert('Error! Failed to update details of student.');
        window.location='/FOODIE/staff/studentSuperChoose.html';
        </script>";
    }
}

if(isset($_POST['Cancel'])) {
    echo "<script language='javascript'>history.back();</script>";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="studentSuper.css" />
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

      <!--MAIN CONTENT-->
      <main class="main-content">
        <header class="header-title">EDIT A STUDENT</header>
        <section class="info-section">
          <form method="POST">
            <div class="form-group">
              <label for="detailID">Student ID: </label>
              <span><?php echo $row['studentID'] ?></span>
              <input type="hidden" id="studentID" name="studentID" value="<?php echo $row['studentID'] ?>"/>
            </div>

            <div class="form-group">
              <label for="studentName">Student Name</label>
              <input type="text" id="studentName" name="studentName" value="<?php echo $row['studentName'] ?>" placeholder="<?php echo $row['studentName'] ?>" maxlength="45" style="font-size:17px;"/>
            </div>

            <div class="form-group">
              <label for="studentGender">Gender</label>
              <input type="text" id="studentGender" name="studentGender" value="<?php echo $row['studentGender'] ?>" placeholder="<?php echo $row['studentGender'] ?>" maxlength="45" style="font-size:17px;"/>
            </div>

            <div class="form-group">
              <label for="studentPhoneNo">Phone No</label>
              <input type="text" id="studentPhoneNo" name="studentPhoneNo" value="<?php echo $row['studentPhoneNo'] ?>" placeholder="<?php echo $row['studentPhoneNo'] ?>" maxlength="45" style="font-size:17px;"/>
            </div>
            
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" value="<?php echo $row['username'] ?>" placeholder="<?php echo $row['username'] ?>" maxlength="45" style="font-size:17px;"/>
            </div>

            <div class="form-group">
              <label for="studentIcNo">Student IC: </label>
              <span><?php echo $row['studentIcNo'] ?></span>
              <input type="hidden" id="studentIcNo" name="studentIcNo" value="<?php echo $row['studentIcNo'] ?>"/>
            </div>

            <div class="form-group">
              <label for="studentEmail">Student Email</label>
              <input type="text" id="studentEmail" name="studentEmail" value="<?php echo $row['studentEmail'] ?>" placeholder="<?php echo $row['studentEmail'] ?>" maxlength="45" style="font-size:17px;"/>
            </div>

            <button type="submit" id="edit" name="edit" title="Button to update details of student" class="btn">
              Edit Student
              <img src="/FOODIE/images/check.png" alt="Select" width="18" height="18" />
            </button>

            <a class="btn-x" href="/FOODIE/staff/studentSuperChoose.html">
              Cancel
              <img src="/FOODIE/images/x_icon.png" alt="Select" width="14" height="14" />
            </a>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
