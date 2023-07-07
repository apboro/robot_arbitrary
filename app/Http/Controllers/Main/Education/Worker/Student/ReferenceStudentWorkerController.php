<?php

namespace App\Http\Controllers\Main\Education\Worker\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\Student\References\StoreRequest;
use App\Http\Requests\Education\Worker\Student\UpdateRequest;
use App\Models\Reference;
use App\Models\ReferenceStudent;
use Illuminate\Support\Facades\Storage;

class ReferenceStudentWorkerController extends Controller
{
    public function show(ReferenceStudent $referenceStudent)
    {
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

    public function update(UpdateRequest $request, ReferenceStudent $referenceStudent)
    {
        $data = $request->validated();

        if (isset($data['reference_file'])) {
            $data['reference_file'] = Storage::disk('public')->put('/references', $data['reference_file']);
        }

        $referenceStudent->update($data);

        return redirect()->route('education.worker.reference.student.show', compact('referenceStudent'));
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('education.student.index');
    }
}
