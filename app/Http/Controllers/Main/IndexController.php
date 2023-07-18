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
        $items = Item::all()->sortBy('title');
        $groups = Group::all()->sortBy('title');
        return view('main.index', compact('items', 'groups'));
    }
}
