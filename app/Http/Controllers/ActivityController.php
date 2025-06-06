<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ActivityController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Activity::with('category')
            ->where('user_id', auth()->id());

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        // Date range filter
        if ($request->filled('date_range')) {
            $range = $request->date_range;
            $query->where(function($q) use ($range) {
                switch ($range) {
                    case 'today':
                        $q->whereDate('start_time', Carbon::today());
                        break;
                    case 'week':
                        $q->whereBetween('start_time', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
                        break;
                    case 'month':
                        $q->whereMonth('start_time', Carbon::now()->month)
                          ->whereYear('start_time', Carbon::now()->year);
                        break;
                }
            });
        }

        $activities = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::where('user_id', auth()->id())
            ->orWhere('is_default', true)
            ->get();

        return view('activities.index', compact('activities', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $activity = Activity::create([
            'user_id' => auth()->id(),
            ...$validated
        ]);

        return redirect()
            ->route('activities.index')
            ->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        $this->authorize('view', $activity);
        $activity->load('category');
        return view('activities.show', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $this->authorize('update', $activity);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $activity->update($validated);

        return redirect()
            ->route('activities.index')
            ->with('success', 'Aktivitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        $this->authorize('delete', $activity);

        $activity->delete();

        return redirect()
            ->route('activities.index')
            ->with('success', 'Aktivitas berhasil dihapus!');
    }

    public function create()
    {
        $categories = Category::where('user_id', auth()->id())
            ->orWhere('is_default', true)
            ->get();

        return view('activities.create', compact('categories'));
    }

    public function edit(Activity $activity)
    {
        $this->authorize('update', $activity);

        $categories = Category::where('user_id', auth()->id())
            ->orWhere('is_default', true)
            ->get();

        return view('activities.edit', compact('activity', 'categories'));
    }
}
