<?php

namespace App\Interfaces\admin\specialization;

use App\Http\Requests\Admin\Specialization\StoreRequest;
use App\Http\Requests\Admin\Specialization\UpdateRequest;
use App\Models\Specialization;

interface AdminSpecializationInterface
{
    public function index();

    public function create();

    public function store(StoreRequest $request, Specialization $specialization);

    public function show(Specialization $specialization);

    public function edit(Specialization $specialization);

    public function update(UpdateRequest $request, Specialization $specialization);

    public function destroy(Specialization $specialization);
}
