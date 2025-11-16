<?php
session_start();
include("studconnection.php");

if (isset($_POST['btnRegister'])) {

    // Sanitize input (no trim)
    $email     = mysqli_real_escape_string($conn, $_POST['email']);
    $name      = mysqli_real_escape_string($conn, $_POST['name']);
    $icNo      = mysqli_real_escape_string($conn, $_POST['icNo']);
    $matricId  = mysqli_real_escape_string($conn, $_POST['matricId']);
    $phoneNo   = mysqli_real_escape_string($conn, $_POST['phoneNo']);
    $gender    = mysqli_real_escape_string($conn, $_POST['gender']);
    $password1 = $_POST['password'];
    $password2 = $_POST['confirmPassword'];

    // Required fields
    if (
        empty($email) || empty($name) || empty($icNo) || empty($matricId) ||
        empty($phoneNo) || $gender === "Choose" || empty($password1) || empty($password2)
    ) {
        echo "<script>alert('Please fill in all fields.'); history.back();</script>";
        exit;
    }

    // Disallow spaces in all fields except Name
    if (preg_match('/\s/', $email)) {
        echo "<script>alert('Email cannot contain spaces.'); history.back();</script>";
        exit;
    }
    if (preg_match('/\s/', $matricId)) {
        echo "<script>alert('Matric ID cannot contain spaces.'); history.back();</script>";
        exit;
    }
    if (preg_match('/\s/', $icNo)) {
        echo "<script>alert('IC Number cannot contain spaces.'); history.back();</script>";
        exit;
    }
    if (preg_match('/\s/', $phoneNo)) {
        echo "<script>alert('Phone number cannot contain spaces.'); history.back();</script>";
        exit;
    }
    if (preg_match('/\s/', $password1)) {
        echo "<script>alert('Password cannot contain spaces.'); history.back();</script>";
        exit;
    }

    // Email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format.'); history.back();</script>";
        exit;
    }

    // Name: letters and spaces only, max 255 characters
    if (!preg_match("/^[A-Za-z\s]+$/", $name) || strlen($name) > 255) {
        echo "<script>alert('Name can contain letters and spaces only, maximum 255 characters.'); history.back();</script>";
        exit;
    }

    // IC: exactly 12 digits
    if (!ctype_digit($icNo) || strlen($icNo) !== 12) {
        echo "<script>alert('IC Number must be exactly 12 digits.'); history.back();</script>";
        exit;
    }

    // Matric ID: alphanumeric, 3–20 characters
    if (!ctype_alnum($matricId) || strlen($matricId) < 3 || strlen($matricId) > 20) {
        echo "<script>alert('Matric ID must be 3-20 characters, letters and numbers only.'); history.back();</script>";
        exit;
    }

    // Phone number: digits only, 9–11 digits
    if (!ctype_digit($phoneNo) || strlen($phoneNo) < 9 || strlen($phoneNo) > 11) {
        echo "<script>alert('Phone number must be 9-11 digits only.'); history.back();</script>";
        exit;
    }

    // Check password length
    if (strlen($password1) < 8 || strlen($password1) > 30) {
        echo "<script>alert('Password must be between 8 and 30 characters.'); history.back();</script>";
        exit;
    }

    // Check for uppercase
    if (!preg_match('/[A-Z]/', $password1)) {
        echo "<script>alert('Password must contain at least 1 uppercase letter.'); history.back();</script>";
        exit;
    }

    // Check for number
    if (!preg_match('/[0-9]/', $password1)) {
        echo "<script>alert('Password must contain at least 1 number.'); history.back();</script>";
        exit;
    }

    // Check for spaces
    if (preg_match('/\s/', $password1)) {
        echo "<script>alert('Password cannot contain spaces.'); history.back();</script>";
        exit;
    }

    // Password match
    if ($password1 !== $password2) {
        echo "<script>alert('Passwords do not match!'); history.back();</script>";
        exit;
    }

    // Check duplicates
    $check = "SELECT * FROM students WHERE MatricNo='$matricId' OR studEmail='$email'";
    $result = mysqli_query($conn, $check);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Matric ID or Email already registered!'); history.back();</script>";
        exit;
    }

    // Insert into database
    $insert = "INSERT INTO students 
               (studEmail, studName, studIcNo, MatricNo, studPhoneNo, studGender, password)
               VALUES ('$email', '$name', '$icNo', '$matricId', '$phoneNo', '$gender', '$password1')";

    if (mysqli_query($conn, $insert)) {
        echo "<script>
                alert('Registration successful!');
                window.location.href = 'login.html';
              </script>";
    } else {
        echo "<script>
                alert('Registration failed: " . mysqli_error($conn) . "');
                history.back();
              </script>";
    }
}
?>