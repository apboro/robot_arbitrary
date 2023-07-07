<?php

namespace App\Http\Controllers\Main\Education\Student\Reference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\Student\References\StoreRequest;
use App\Models\Reference;
use App\Models\ReferenceStudent;

class ReferenceStudentController extends Controller
{
    public function index()
    {
        $references = Reference::all()->sortBy('id');
        $completedReferences = ReferenceStudent::where('status', 'Выполнено')->where('user_id', auth()->user()->id)->count();
        $user = auth()->user();
        $myReferences = $user->references()->orderBy('created_at', 'desc')->get();

        return view('education.student.reference.index', compact('references', 'completedReferences', 'myReferences'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        ReferenceStudent::create($data);

        return redirect()->route('education.student.reference.index');
    }

    public function show(ReferenceStudent $referenceStudent)
    {
        return view('education.student.reference.show', compact('referenceStudent'));
    }
}
