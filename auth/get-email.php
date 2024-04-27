<?php

include '../include/connection.php';

    $email = $_POST['email'];

    $email_data = $link->rawQueryOne("select * from users where email=?", array($email));

    if($email_data)
    {
        echo 'true';
    }
    else
    {
        echo 'false';
    }

?>
