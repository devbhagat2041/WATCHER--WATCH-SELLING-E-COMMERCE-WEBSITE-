<?php

include '../include/connection.php';

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $contact = $_REQUEST['phone'];
    $message = $_REQUEST['message'];

    $data = array(
        "name" => $name,
        "email" => $email,
        "contact" => $contact,
        "message" => $message,
    );

    $sql_insert = $link->insert('inquiries', $data);

    if ($sql_insert) {
        echo "success";
    } else {

        echo "fail";
    }
    // exit();

?>
