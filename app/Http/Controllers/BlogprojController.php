<?php

namespace App\Http\Controllers;

use App\Models\blogproj;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class BlogprojController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('blogproj.index', [
            'blogproj' => Blogproj::with('user')->latest()->get(),
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->blogproj()->create($validated);
 
        return redirect(route('blogproj.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(blogproj $blogproj): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blogproj $blogproj): View
    {
        $this->authorize('update', $blogproj);
 
        return view('blogproj.edit', [
            'blogproj' => $blogproj,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, blogproj $blogproj): RedirectResponse
    {
        $this->authorize('update', $blogproj);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $blogproj->update($validated);
 
        return redirect(route('blogproj.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blogproj $blogproj): RedirectResponse
    {
        $this->authorize('delete', $blogproj);
 
        $blogproj->delete();
 
        return redirect(route('blogproj.index'));
    }
}
