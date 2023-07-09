<?php

namespace App\Http\Controllers\Main\Robot\Arbitrary;

use App\Http\Controllers\Controller;

class RobotArbitraryController extends Controller
{
    public function index()
    {
        return view('robot.arbitrary.index');
    }
}
