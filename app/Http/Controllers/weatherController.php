<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weatherController extends Controller
{
    public function getWeather($city = null){
        if(!$city){
            return "Plase provide a City";
        }
        return "Weather $city is good";
    }
}
