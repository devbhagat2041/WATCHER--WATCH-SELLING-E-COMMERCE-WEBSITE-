<?php

include '../include/connection.php';

    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $contact = $_REQUEST['contact'];
    $dob = $_REQUEST['dob'];
    $address = $_REQUEST['address'];
    $state = $_REQUEST['state'];
    $city = $_REQUEST['city'];
    $pincode = $_REQUEST['pincode'];


    //Encrypted Password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $data = array(
        "fname" => $fname,
        "lname" => $lname,
        "email" => $email,
        "contact" => $contact,
        "dob" => $dob,
        "address" => $address,
        "state" => $state,
        "city" => $city,
        "pincode" => $pincode,
        "password" => $password_hash,
    );

    $sql_insert = $link->insert('users', $data);
echo "success";
    /*if ($sql_insert) {

        $user = $link->rawQueryOne("select * from users where email=?",array($email));

        $user_id = $user['user_id'];

        $cart_data = array(
            "user_id" => $user_id
        );

        $sql_insert_cart = $link->insert('cart', $cart_data);

        if($sql_insert_cart)
        {
            echo "success";
        }

    } else {

        echo "fail";
    }*/
    // exit();

?>
