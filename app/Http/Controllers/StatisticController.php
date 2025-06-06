<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StatisticController extends Controller
{
    public function weekly()
    {
        $userId = Auth::id();
        $start = now()->subDays(6)->startOfDay();
        $data = Activity::where('user_id', $userId)
            ->where('date', '>=', $start)
            ->selectRaw('date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        return response()->json($data);
    }

    public function monthly()
    {
        $userId = Auth::id();
        $start = now()->subDays(29)->startOfDay();
        $data = Activity::where('user_id', $userId)
            ->where('date', '>=', $start)
            ->selectRaw('date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        return response()->json($data);
    }

    public function byCategory()
    {
        $userId = Auth::id();
        $data = Activity::where('user_id', $userId)
            ->selectRaw('category_id, count(*) as total')
            ->groupBy('category_id')
            ->get();
        return response()->json($data);
    }
}
