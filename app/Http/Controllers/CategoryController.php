<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $categories = Category::where('is_default', true)
            ->orWhere('user_id', $userId)
            ->get();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category = Category::create([
            'name' => $validated['name'],
            'user_id' => Auth::id(),
            'is_default' => false,
        ]);
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        if ($category->is_default || $category->user_id === Auth::id()) {
            return response()->json($category);
        }
        return response()->json(['message' => 'Not authorized'], 403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        if ($category->is_default || $category->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not authorized'], 403);
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $category->update($validated);
        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->is_default || $category->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not authorized'], 403);
        }
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
