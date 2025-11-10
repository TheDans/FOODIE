<?php
include("adminconnection.php");

if (isset($_GET['adminID']) && isset($_GET['action'])) {
    $adminID = $_GET['adminID'];
    $action = $_GET['action'];

    if ($action == "deactivate") {
        $sql = "UPDATE admins SET is_active = 0 WHERE adminID = '$adminID'";
        $message = "Admin has been deactivated.";
    } elseif ($action == "activate") {
        $sql = "UPDATE admins SET is_active = 1 WHERE adminID = '$adminID'";
        $message = "Admin has been reactivated.";
    } else {
        header("Location: adminSuper.php");
        exit();
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('$message');
                window.location.href = 'adminSuperChoose.html';
              </script>";
    } else {
        echo "<script>
                alert('Error updating admin status.');
                window.location.href = 'adminSuperChoose.html';
              </script>";
    }
} else {
    header("Location: adminSuper.php");
    exit();
}
?>
