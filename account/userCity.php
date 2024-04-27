<?php

    include '../include/connection.php';

    $ucid = $_POST["city_id"];

    $city_data = $link->rawQueryOne("select * from cities where city_id=?", array($ucid));

    $state_id = $city_data['state_id'];

    $link->where('state_id', $state_id);
    $cities_data = $link->get('cities');

    foreach($cities_data as $data)
    {
        if($ucid == $data['city_id'])
        {
            echo '<option value="'.$data['city_id'].'" selected>'.$data['city_name'].'</option>'; 
        }
        else
        {
            echo '<option value="'.$data['city_id'].'">'.$data['city_name'].'</option>'; 
        }
        
    } 

?>