<?php

namespace App\Http\Controllers\Main\Education\Worker\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\Worker\Student\UpdateRequest;
use App\Models\ReferenceStudent;
use Illuminate\Support\Facades\Storage;

class ReferenceStudentWorkerController extends Controller
{
    public function show(ReferenceStudent $referenceStudent)
    {
        return view('education.worker.student.index', compact('referenceStudent'));
    }

    public function update(UpdateRequest $request, ReferenceStudent $referenceStudent)
    {
        $data = $request->validated();

        if (isset($data['reference_file'])) {
            $data['reference_file'] = Storage::disk('public')->put('/references', $data['reference_file']);
        }

        $referenceStudent->update($data);

        return redirect()->route('education.worker.student.show', compact('referenceStudent'));
    }

    public function download(ReferenceStudent $referenceStudent)
    {
        return response()->download('storage/' . $referenceStudent->reference_file);
    }
}
