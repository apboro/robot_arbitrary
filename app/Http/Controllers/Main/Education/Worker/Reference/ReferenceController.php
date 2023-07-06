<?php

namespace App\Http\Controllers\Main\Education\Worker\Reference;

use App\Http\Controllers\Controller;
use App\Http\Requests\Education\Worker\References\StoreRequest;
use App\Http\Requests\Education\Worker\References\UpdateRequest;
use App\Models\Reference;

class ReferenceController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Reference::create($data);

        return redirect()->route('worker.index');
    }

    public function edit(Reference $reference)
    {
        return view('education.worker.edit', compact('reference'));
    }

    public function update(UpdateRequest $request, Reference $reference)
    {
        $data = $request->validated();

        $reference->update($data);

        return view('education.worker.edit', compact('reference'));
    }

    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->route('worker.index');
    }
}
