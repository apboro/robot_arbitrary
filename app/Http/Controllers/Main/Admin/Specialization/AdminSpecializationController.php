<?php

namespace App\Http\Controllers\Main\Admin\Specialization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Specialization\StoreRequest;
use App\Http\Requests\Admin\Specialization\UpdateRequest;
use App\Interfaces\admin\specialization\AdminSpecializationInterface;
use App\Models\Specialization;

class AdminSpecializationController extends Controller implements AdminSpecializationInterface
{
    public function index()
    {
        $specializations = Specialization::all()->sortBy('id');
        return view('admin.specialization.index', compact('specializations'));
    }

    public function create()
    {
        return view('admin.specialization.create');
    }

    public function store(StoreRequest $request, Specialization $specialization)
    {
        $data = $request->validated();
        Specialization::firstOrCreate(['title' => $data['title']], $data);

        return redirect()->route('admin.specialization.index');
    }

    public function show(Specialization $specialization)
    {
        $groups = $specialization->groups;
        $groupsCount = $specialization->groups()->count();
        return view('admin.specialization.show', compact('specialization', 'groups', 'groupsCount'));
    }

    public function edit(Specialization $specialization)
    {
        return view('admin.specialization.edit', compact('specialization'));
    }

    public function update(UpdateRequest $request, Specialization $specialization)
    {
        $data = $request->validated();
        $specialization->update($data);

        return redirect()->route('admin.specialization.edit', compact('specialization'));
    }

    public function destroy(Specialization $specialization)
    {
        $specialization->delete();
        return redirect()->route('admin.specialization.index');
    }
}
