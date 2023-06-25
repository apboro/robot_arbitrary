<?php

namespace App\Http\Controllers\Main\Admin\Group\Specialization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\Specialization\StoreRequest;
use App\Interfaces\admin\groups\specialization\AdminGroupSpecializationInterface;
use App\Models\Group;

class AdminGroupSpecializationController extends Controller implements AdminGroupSpecializationInterface
{
    public function store(StoreRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->specializations()->sync($data['specialization_id']);

        return redirect()->route('admin.group.show', compact('group'));
    }
}
