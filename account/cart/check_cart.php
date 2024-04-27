<?php

    include '../include/connection.php';

    $email = $_POST["email"];

    // $user_data = $link->rawQueryOne("select * from user where email=?", array($email));

    // $user_id = $user_data['user_id'];

    // $link->where('user_id', $user_id);
    // $cart_data = $link->get('cart');

    // if($cart_data['product_ids'] == null || $cart_data['product_ids'] == 0)
    // {
    //     $response = 0;
    //     echo $response;
    // }

    echo $email;

?>