<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->date) {
            $filterDate = $request->date;
        } else {
            $filterDate = date('Y-m-d');
        };

        $carbonDate = Carbon::createFromDate($filterDate);


        $data['date_as_string'] = $carbonDate->translatedFormat('d \d\e M');

        $data['date_prev_button'] = $carbonDate->addDay(-1)->format('Y-m-d');
        $data['date_next_button'] = $carbonDate->addDay(2)->format('Y-m-d');

        // $filterDate = date('Y-m-d');

        $data['tasks'] = Task::whereDate('due_date', $filterDate)->get();

        $data['AuthUser'] = Auth::user();

        $data['tasks_count'] = $data['tasks']->count();

        $data['undone_tasks_count'] = $data['tasks']->where('is_done', false)->count();


        return view('home', $data);
    }
}
