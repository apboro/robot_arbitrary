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
        $completedReferences = ReferenceStudent::where('status', 'Выполнено')->count();
        $user = auth()->user();
        $myReferences = $user->references()->orderBy('created_at', 'desc')->get();
//        foreach ($claims as $claim) {
//            dd($claim->reference_student);
//        }
        return view('education.student.reference.index', compact('references', 'completedReferences', 'myReferences'));
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
