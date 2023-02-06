<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatanController extends Controller
{
    public function index () {
        return view("home");
    }

    public function dataTable () {
        return view("test.dataTable");
    }

}
