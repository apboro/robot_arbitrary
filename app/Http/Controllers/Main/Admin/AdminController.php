<?php

namespace App\Http\Controllers\Main\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Item;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $data = [];
        $data['userCount'] = User::all()->count();
        $data['groupCount'] = Group::all()->count();
        $data['itemCount'] = Item::all()->count();
        return view('admin.index', compact('data'));
    }
}
