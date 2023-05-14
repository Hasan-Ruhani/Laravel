<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class getController extends Controller
{
    public function get($userName='Hasan', $userId='2'){
        return view('test.get',[
            'name' => $userName,
            'id'   => $userId
        ]);
    }
}
