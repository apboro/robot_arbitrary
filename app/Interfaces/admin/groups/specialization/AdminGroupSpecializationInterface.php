<?php

namespace App\Interfaces\admin\groups\specialization;

use App\Http\Requests\Admin\Group\Specialization\StoreRequest;
use App\Models\Group;

interface AdminGroupSpecializationInterface
{
    public function store(StoreRequest $request, Group $group);
}
