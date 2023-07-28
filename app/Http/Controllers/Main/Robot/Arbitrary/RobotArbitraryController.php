<?php

namespace App\Http\Controllers\Main\Robot\Arbitrary;

use App\Http\Controllers\Controller;
use App\Http\Requests\Robot\Arbitrary\ShowRobotArbitraryRequest;
use App\Models\Group;
use App\Models\Truancies;
use Carbon\Carbon;

class RobotArbitraryController extends Controller
{
    public function index()
    {
        $groups = Group::all()->sortBy('title');

        return view('robot.arbitrary.index', compact('groups'));
    }

    public function show(ShowRobotArbitraryRequest $request)
    {
        $students = Truancies::query()
            ->with(['student'])
            ->where('group_id', $request->group_id)
            ->whereBetween('created_at',
                [Carbon::parse($request->date_from), Carbon::parse($request->date_to)])
            ->selectRaw('student_id, SUM(count_hours) as total_hours')
            ->groupBy('student_id')
            ->get();
        $totalHoursSum = $students->sum('total_hours');
        $groups = Group::all()->sortBy('title');


        return view('robot.arbitrary.index', compact('groups', 'students', 'totalHoursSum'));
    }
}
