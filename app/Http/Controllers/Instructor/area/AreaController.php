<?php

namespace App\Http\Controllers\Instructor\area;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    //

    public function index()
    {
        return view('Instructor.area.index');
    }
}
