<?php

    include '../include/connection.php';

    $state_id = $_POST["state_id"];

    $link->where('state_id', $state_id);
    $cities_data = $link->get('cities');

    foreach($cities_data as $data)
    {
        echo '<option value="'.$data['city_id'].'">'.$data['city_name'].'</option>'; 
    }

?>