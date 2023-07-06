<?php

namespace App\Http\Controllers\Main\Education\Worker;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use Carbon\Carbon;

class WorkerController extends Controller
{
    public function index()
    {
        $references = Reference::all()->sortBy('id');
        return view('education.worker.index', compact('references'));
    }
}
