<?php

namespace App\Http\Controllers\Main\Admin\Group\Curator;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Group\Curator\StoreRequest;
use App\Interfaces\admin\groups\curator\AdminCuratorGroupInterface;
use App\Models\Group;

class AdminCuratorGroupController extends Controller implements AdminCuratorGroupInterface
{
    public function store(StoreRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->curators()->sync($data['user_id']);

        return redirect()->route('admin.group.show', compact('group'));
    }
}
