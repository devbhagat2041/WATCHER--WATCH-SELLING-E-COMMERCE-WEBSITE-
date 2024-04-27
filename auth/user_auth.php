<?php

  session_start();

  include "../include/connection.php";

  $email = $_POST['email'];
  $pass = $_POST['password'];

  $userdata = $link->rawQueryOne("select * from users where email=?", array($email));

  $user_password = $userdata['password'];

  $verify = password_verify($pass, $user_password);

  if ($verify) {
    
    $_SESSION['email'] = $userdata['email'];
    $_SESSION['fname'] = $userdata['fname'];
    $_SESSION['lname'] = $userdata['lname'];


    echo "success";

  } else {
    echo "fail";
  }
  exit();

?>