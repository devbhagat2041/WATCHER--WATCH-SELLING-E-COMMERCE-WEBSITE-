<?php

session_start();

include "../include/connection.php";

if (isset($_POST['do_login'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];

  $admindata = $link->rawQueryOne("select * from admin where email=? and password=?", array($email, $pass));

  if ($admindata) {
    $_SESSION['email'] = $email;

    echo "success";

    

  } else {
    echo "fail";
  }
  exit();
}
