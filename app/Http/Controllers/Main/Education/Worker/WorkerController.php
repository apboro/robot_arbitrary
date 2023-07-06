<?php

namespace App\Http\Controllers\Main\Education\Worker;

use App\Http\Controllers\Controller;

class WorkerController extends Controller
{
    public function index()
    {
        return view('education.worker.index');
    }
}
