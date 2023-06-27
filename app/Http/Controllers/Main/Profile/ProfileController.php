<?php

namespace App\Http\Controllers\Main\Profile;

use App\Http\Controllers\Controller;
use App\Interfaces\profile\ProfileInterface;

class ProfileController extends Controller implements ProfileInterface
{
    public function index()
    {
        return view('profile.index');
    }
}
