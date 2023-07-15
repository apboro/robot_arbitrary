<?php

namespace App\Http\Controllers\Main\Robot\Today;

use App\Http\Controllers\Controller;

class RobotTodayController extends Controller
{
    public function index()
    {
        return view('robot.today.index');
    }

    public function show()
    {
        return view('robot.today.show');
    }
}
