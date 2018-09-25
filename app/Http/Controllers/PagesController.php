<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Created by PhpStorm.
 * User: quantien
 * Date: 25/09/2018
 * Time: 11:28
 */
class PagesController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
}

