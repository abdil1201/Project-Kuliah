<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function exportActivities()
    {
        $userId = Auth::id();
        $activities = Activity::where('user_id', $userId)->get();
        $filename = 'activities.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];
        $columns = ['id', 'category_id', 'title', 'description', 'date', 'duration', 'created_at', 'updated_at'];
        $callback = function() use ($activities, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($activities as $activity) {
                fputcsv($file, $activity->only($columns));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function exportNotes()
    {
        $userId = Auth::id();
        $notes = Note::where('user_id', $userId)->get();
        $filename = 'notes.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];
        $columns = ['id', 'title', 'content', 'created_at', 'updated_at'];
        $callback = function() use ($notes, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($notes as $note) {
                fputcsv($file, $note->only($columns));
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }

    public function activities(Request $request)
    {
        $query = Activity::with('category')
            ->where('user_id', auth()->id());

        // Apply filters if any
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('date_range')) {
            $range = $request->date_range;
            $query->where(function($q) use ($range) {
                switch ($range) {
                    case 'today':
                        $q->whereDate('start_time', now());
                        break;
                    case 'week':
                        $q->whereBetween('start_time', [now()->startOfWeek(), now()->endOfWeek()]);
                        break;
                    case 'month':
                        $q->whereMonth('start_time', now()->month)
                          ->whereYear('start_time', now()->year);
                        break;
                }
            });
        }

        $activities = $query->latest()->get();

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="aktivitas.csv"',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];

        $callback = function() use ($activities) {
            $file = fopen('php://output', 'w');
            
            // Add UTF-8 BOM for proper Excel encoding
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            // Headers
            fputcsv($file, [
                'Judul',
                'Kategori',
                'Deskripsi',
                'Waktu Mulai',
                'Waktu Selesai',
                'Durasi (Menit)',
                'Dibuat Pada',
            ]);

            // Data rows
            foreach ($activities as $activity) {
                $duration = $activity->start_time->diffInMinutes($activity->end_time);
                
                fputcsv($file, [
                    $activity->title,
                    $activity->category->name,
                    $activity->description,
                    $activity->start_time->format('Y-m-d H:i:s'),
                    $activity->end_time->format('Y-m-d H:i:s'),
                    $duration,
                    $activity->created_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
