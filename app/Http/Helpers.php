<?php

use App\Models\home;

function get_homes_value($key){
    $data = home::where('key',$key)->first();
    if (isset($data-> value)) {
        return $data->value;

    } else {
        return 'empty';
    }
}
