<?php

namespace App\Http\Controllers\Main\Education\Worker\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\Education\Student\Reference\UpdateRequest;
use App\Http\Requests\Education\Student\References\StoreRequest;
use App\Models\Reference;
use App\Models\ReferenceStudent;

class ReferenceStudentWorkerController extends Controller
{
    public function show(ReferenceStudent $referenceStudent)
    {

        // dd($referenceStudent);
        return view('education.worker.student.index', compact('referenceStudent'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        ReferenceStudent::create($data);

        return redirect()->route('education.student.reference.index');
    }

    public function edit(Reference $reference)
    {
        return view('education.student.edit', compact('reference'));
    }

    public function update(UpdateRequest $request, Reference $reference)
    {
        $data = $request->validated();

        $reference->update($data);

        return view('education.student.edit', compact('reference'));
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('education.student.index');
    }
}
