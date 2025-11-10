<?php
  include("adminconnection.php");
if (isset($_GET['adminID'])) {
      $adminID = $_GET['adminID'];
  
      // Soft delete - mark admin as inactive
      $sql = "UPDATE admins SET is_active = 0 WHERE adminID = '$adminID'";
      if (mysqli_query($conn, $sql)) {
          echo "<script>
                  alert('Admin has been deactivated successfully.');
                  window.location.href = 'adminSuperChoose.html';
                </script>";
      } else {
          echo "<script>
                  alert('Error deactivating admin.');
                  window.location.href = 'adminSuperChoose.html';
                </script>";
      }
  } 

?>