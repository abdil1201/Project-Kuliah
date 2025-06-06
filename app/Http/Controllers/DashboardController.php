<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Get total counts
        $totalActivities = Activity::where('user_id', $user->id)->count();
        $totalNotes = Note::where('user_id', $user->id)->count();
        $todayActivities = Activity::where('user_id', $user->id)
            ->whereDate('created_at', Carbon::today())
            ->count();
        $importantNotes = Note::where('user_id', $user->id)
            ->where('is_important', true)
            ->count();

        // Get recent items
        $recentActivities = Activity::with('category')
            ->where('user_id', $user->id)
            ->latest()
            ->take(5)
            ->get();

        $recentNotes = Note::where('user_id', $user->id)
            ->latest()
            ->take(6)
            ->get();

        return view('dashboard', compact(
            'totalActivities',
            'totalNotes',
            'todayActivities',
            'importantNotes',
            'recentActivities',
            'recentNotes'
        ));
    }
} 