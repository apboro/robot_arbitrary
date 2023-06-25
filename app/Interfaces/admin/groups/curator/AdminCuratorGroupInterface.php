<?php

namespace App\Interfaces\admin\groups\curator;

use App\Http\Requests\Admin\Group\Curator\StoreRequest;
use App\Models\Group;

interface AdminCuratorGroupInterface
{
    public function store(StoreRequest $request, Group $group);
}
