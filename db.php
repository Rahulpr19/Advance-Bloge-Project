<?php
session_start();

// initializing variables
$username = "";
$email  = "";
$errorscon = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blog_cms');

// REGISTER USER
if (isset($_POST['submit_ok'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $MobileNo = mysqli_real_escape_string($db, $_POST['MobileNo']);
  $Message = mysqli_real_escape_string($db, $_POST['Message']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errorscon array
  if (empty($username)) { array_push($errorscon, "Username is required"); }
  if (empty($email)) { array_push($errorscon, "Email is required"); }
  if (empty($MobileNo)) { array_push($errorscon, "Mobile No. is required"); }
  if (empty($Message)) { array_push($errorscon, "Message is required"); }
  

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM contactus WHERE email='$email' OR MobileNo='$MobileNo' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['email'] === $email) {
      array_push($errorscon, "email already exists");
    }

    if ($user['MobileNo'] === $MobileNo) {
      array_push($errorscon, "Mobile No. already exists");
    }
  }
    $query = "INSERT INTO contactus (username, email, MobileNo ,Message)
          VALUES('$username', '$email', '$MobileNo' ,'$Message')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You're Provide To Login Now";
    header('location: message.php');
  }

?>


