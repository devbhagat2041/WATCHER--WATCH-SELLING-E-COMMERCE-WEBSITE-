<?php

include '../include/connection.php';

$cid = $_REQUEST['cid'];

$link->where('cart_id', $cid);
$del = $link->delete('cart');

if ($del) {
        echo "success";
    } else {
        echo "fail";
    }

?>
