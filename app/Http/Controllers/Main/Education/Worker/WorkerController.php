<?php

namespace App\Http\Controllers\Main\Education\Worker;

use App\Http\Controllers\Controller;
use App\Models\Reference;
use App\Models\ReferenceStudent;

class WorkerController extends Controller
{
    public function index()
    {
        $references = Reference::all()->sortBy('id');
        $referencesStudent = ReferenceStudent::all()->sortByDesc('status');
        $newReferences = ReferenceStudent::where('status', 'Новая')->count();
        return view('education.worker.index', compact('references', 'referencesStudent', 'newReferences'));
    }
}
