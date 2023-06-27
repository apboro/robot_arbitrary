<?php

namespace App\Http\Controllers\Main\Profile;

use App\Http\Controllers\Controller;
use App\Interfaces\profile\ProfileInterface;
use Carbon\Carbon;

class ProfileController extends Controller implements ProfileInterface
{
    public function index()
    {
        $curators = auth()->user()->teams;
        $groups = auth()->user()->groups;
        $dateCreated = Carbon::parse(auth()->user()->created_at);
        return view('profile.index', compact('dateCreated', 'curators', 'groups'));
    }
}
