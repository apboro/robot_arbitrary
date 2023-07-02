<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Truancies\Search\SearchRequest;
use App\Models\Group;
use App\Models\Item;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $items = Item::all();
        $groups = Group::all();
        return view('main.index', compact('items', 'groups'));
    }

    public function search(SearchRequest $request)
    {
        $data = $request->validated();
        $items = Item::all();
        $groups = Group::all();

        $group = Group::find($data['group_id']);
        $item = Item::find($data['item_id']);
        $couple = $data['couple'];

        return view('truancy.index', compact('items', 'groups', 'group', 'item', 'couple'));
    }
}
