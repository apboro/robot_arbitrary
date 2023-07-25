<?php

namespace App\Http\Controllers\Main\Truancy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Truancies\TruancySearchRequest;
use App\Http\Requests\Truancies\TruancyStoreRequest;
use App\Models\Group;
use App\Models\Item;
use App\Models\Truancies;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class TruancyController extends Controller
{
    /**
     * @param TruancySearchRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index(TruancySearchRequest $request)
    {
        $data = $request->validated();
        $group = Group::find($data['group_id']);
        $item = Item::find($data['item_id']);
        $couple = $data['couple'];

        return view('truancy.index', compact('group', 'item', 'couple'));
    }

    /**
     * @param TruancyStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TruancyStoreRequest $request)
    {
        $data = $request->validated();
        $group = $data['group_id'];
        $item = $data['item_id'];
        $couple = $data['couple'];
        $students = $data['student_id'];
        $hoursArr = $data['count_hours'];
        $data['teacher_id'] = Auth::user()->id;
        foreach ($students as $index => $student_id)
        {
            if ($hoursArr[$index] > 0) {
                $data['student_id'] = $student_id;
                $data['count_hours'] = $hoursArr[$index];
                Truancies::create($data);
            }
        }

        return redirect()->route('truancy.index', compact('group', 'item', 'couple'));
    }
}
