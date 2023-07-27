<?php

namespace App\Http\Controllers\Main\Robot\Today;

use App\Http\Controllers\Controller;
use App\Models\Truancies;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RobotTodayController extends Controller
{
    public function index()
    {
        $truancies = Truancies::query()
            ->whereDate('created_at', Carbon::now())
            ->groupBy('group_id')
            ->orderBy('created_at', 'desc')
            ->selectRaw('group_id, MAX(created_at) as created_at')
            ->get();

        return view('robot.today.index', ['truancies' => $truancies]);
    }

    public function show(Request $request)
    {
        $truanciesQuery = Truancies::query()
            ->with(['group','student', 'item'])
            ->where('group_id', $request->id)
            ->whereDate('created_at', Carbon::now());

        foreach ($truanciesQuery->get() as $tru){
            $studentsHoursByCouples[$tru->student->fullName][$tru->couple] = $tru->count_hours;
        }
        ksort($studentsHoursByCouples);
        return view('robot.today.show', [
            'truancies' => $truanciesQuery->get(),
            'totalHours' => $truanciesQuery->sum('count_hours'),
            'students' => $studentsHoursByCouples,
            'items' => $truanciesQuery->clone()->groupBy('item_id', 'couple')
                ->get(['item_id', 'couple'])->sortBy('couple')->values(),
        ]);
    }
}
