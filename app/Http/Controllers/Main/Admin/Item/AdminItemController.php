<?php

namespace App\Http\Controllers\Main\Admin\Item;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Item\StoreRequest;
use App\Http\Requests\Admin\Item\UpdateRequest;
use App\Models\Item;
use Carbon\Carbon;

class AdminItemController extends Controller
{
    public function index()
    {
        $itemCount = Item::all()->count();
        $items = Item::all()->sortBy('id');
        return view('admin.item.index', compact('items', 'itemCount'));
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Item::firstOrCreate(['title' => $data['title']], $data);

        return redirect()->route('admin.item.index');
    }

    public function show(Item $item)
    {
        $dateCreated = Carbon::parse($item->created_at);
        return view('admin.item.show', compact('item', 'dateCreated'));
    }

    public function edit(Item $item)
    {
        return view('admin.item.edit', compact('item'));
    }

    public function update(UpdateRequest $request, Item $item)
    {
        $data = $request->validated();
        $item->update($data);

        return redirect()->route('admin.item.edit', compact('item'));
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.item.index');
    }
}
