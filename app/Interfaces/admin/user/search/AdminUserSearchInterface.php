<?php

namespace App\Interfaces\admin\user\search;

use App\Http\Requests\Admin\User\Search\SearchRequest;

interface AdminUserSearchInterface
{
    public function search(SearchRequest $request);
}
