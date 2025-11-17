<?php
session_start();
include("studconnection.php");

if (isset($_POST['btnRegister']))
{

    // Sanitize input (no trim)
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $icNo      = mysqli_real_escape_string($conn, $_POST['icNo']);
    $matricId  = mysqli_real_escape_string($conn, $_POST['MatricNo']);
    $phoneNo   = mysqli_real_escape_string($conn, $_POST['phoneNo']);
    $gender    = mysqli_real_escape_string($conn, $_POST['gender']);
    $password1 = $_POST['password'];
    $password2 = $_POST['confirmPassword'];

    // Required fields
    if (
        empty($email) || empty($name) || empty($icNo) || empty($matricId) ||
        empty($phoneNo) || empty($gender) || empty($password1) || empty($password2)
    )
    {
        echo "<script>alert('Please fill in all fields.'); history.back();</script>";
        exit;
    }

    // Password match
    if ($password1 !== $password2)
    {
        echo "<script>alert('Passwords do not match!'); history.back();</script>";
        exit;
    }

    // Check duplicates
    $check = "SELECT * FROM students WHERE MatricNo='$matricId' OR studEmail='$email'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 0)
    {
        echo "<script>alert('Matric ID or Email already registered!'); history.back();</script>";
        exit;
    }

    // Insert into database
    $insert = "INSERT INTO students 
               (studEmail, studName, studIcNo, MatricNo, studPhoneNo, studGender, password, user_image)
               VALUES ('$email', '$name', '$icNo', '$matricId', '$phoneNo', '$gender', '$password1', '$user_image')";

    if (mysqli_query($conn, $insert))
    {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'login.html';
              </script>";
    }
    
    else
    {
        echo "<script>
                alert('Registration failed: " . mysqli_error($conn) . "');
                history.back();
              </script>";
    }
}
?>