<?php

namespace App\Http\Controllers\Main\Truancy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Truancies\Search\SearchRequest;
use App\Http\Requests\Truancies\StoreRequest;
use App\Models\Group;
use App\Models\Item;
use App\Models\Truancies;

class TruancyController extends Controller
{
    public function index(SearchRequest $request)
    {
        $data = $request->validated();

        $group = Group::find($data['group_id']);
        $item = Item::find($data['item_id']);
        $couple = $data['couple'];

        return view('truancy.index', compact('group', 'item', 'couple'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
//dd($data);
        Truancies::insert($data);

        return redirect()->route('main.index');
    }
}
