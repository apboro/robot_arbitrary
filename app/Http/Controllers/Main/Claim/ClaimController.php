<?php

namespace App\Http\Controllers\Main\Claim;

use App\Http\Controllers\Controller;
use App\Http\Requests\Curator\Student\StoreRequest;
use App\Models\User;

class ClaimController extends Controller
{
    public function index()
    {
        return view('claim.index');
    }
}
