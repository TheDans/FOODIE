<?php
session_start();
include("studconnection.php");

if(!isset($_SESSION['userlogged']) || $_SESSION['userlogged'] != 1)
{
    header("Location: /FOODIE/landing-page/index.html");
    exit();
}

$sql = "select * from staff s,buildings b
        where s.buildingID = b.buildingID";
$qry = mysqli_query($conn,$sql);


echo'

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="adminContactStyle.css" />
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
          <a href="#" class="nav-item">RECEIPTS</a>
          <a href="#" class="nav-item">CART, DORM &amp; DATES</a>
          <a href="#" class="nav-item active">STAFF CONTACT</a>
          <a href="logout.php" class="nav-item">LOG OUT</a>
        </nav>
      </aside>

      <!--MAIN CONTENT-->
      <main class="main-content">
        <header class="header-title">STAFF CONTACT</header>

      ';

      while($r = mysqli_fetch_assoc($qry)){
        $staffID = $r['staffID'];
        $sqlname = "SELECT 
            TRIM(
                CASE
                    WHEN staffName LIKE '% BIN %' THEN SUBSTRING_INDEX(staffName, ' BIN ', 1)
                    WHEN staffName LIKE '% BINTI %' THEN SUBSTRING_INDEX(staffName, ' BINTI ', 1)
                    ELSE SUBSTRING_INDEX(staffName, ' ', 1)
                END
            ) AS shortName
        FROM staff
        WHERE staffID = '$staffID'";
        $qryName = mysqli_query($conn, $sqlname);
        $result = mysqli_fetch_assoc($qryName);


        if(isset($result['shortName'])){
          $shortName = $result['shortName'];
        } else{
          $shortName =$r['staffName'];
        }

        if ($r['staffGender'] == 'M') {
            $genderFull = 'Male'; 
        } else {
            $genderFull = 'Female';
        }
      

      
        $genderUpper = strtoupper($genderFull);
        $displayName = ucwords(strtolower($shortName));
        $building = $r['buildingName'];
     


      echo'
        <!-- personal information section-->
        <section class="info-section">
          <h3 class="section-title">'.$displayName.'</h3>
          <div class="info-grid">
            <div class="info-item">
              <span class="info-label">BUILDINGS</span>
              <span class="info-value">'.$building.'</span>
            </div>
            <div class="info-item">
              <span class="info-label">Email Address</span>
              <span class="info-value">' . $r['staffEmail'] . '</span>
            </div>
            <div class="info-item">
              <span class="info-label">Phone No</span>
              <span class="info-value">' . $r['staffPhoneNo'] . '</span>
            </div>
          </div>
        </section>

        ';
      }

 echo '</main>
    </div>
  </body>
</html>
';
      

?>