<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StatisticsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get activities statistics
        $totalActivities = Activity::where('user_id', $user->id)->count();
        $activitiesThisWeek = Activity::where('user_id', $user->id)
            ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
            ->count();
        $activitiesThisMonth = Activity::where('user_id', $user->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        // Get notes statistics
        $totalNotes = Note::where('user_id', $user->id)->count();
        $importantNotes = Note::where('user_id', $user->id)
            ->where('is_important', true)
            ->count();
        $notesThisMonth = Note::where('user_id', $user->id)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        // Get activities by category
        $activitiesByCategory = Activity::with('category')
            ->where('user_id', $user->id)
            ->get()
            ->groupBy('category.name')
            ->map(function ($items) {
                return $items->count();
            });

        // Get recent activity trend (last 7 days)
        $activityTrend = collect(range(6, 0))->map(function ($days) use ($user) {
            $date = Carbon::now()->subDays($days);
            return [
                'date' => $date->format('Y-m-d'),
                'count' => Activity::where('user_id', $user->id)
                    ->whereDate('created_at', $date)
                    ->count()
            ];
        });

        return view('statistics', compact(
            'totalActivities',
            'activitiesThisWeek',
            'activitiesThisMonth',
            'totalNotes',
            'importantNotes',
            'notesThisMonth',
            'activitiesByCategory',
            'activityTrend'
        ));
    }
} 