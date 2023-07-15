<?php

namespace App\Http\Controllers\Main\Robot\Arbitrary;

use App\Http\Controllers\Controller;
use App\Models\Group;

class RobotArbitraryController extends Controller
{
    public function index()
    {
        $groups = Group::all()->sortBy('title');
        return view('robot.arbitrary.index', compact('groups'));
    }
}
