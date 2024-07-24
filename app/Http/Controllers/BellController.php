<?php

namespace App\Http\Controllers;

use App\Models\Bell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;


class BellController extends Controller implements HasMiddleware
{
    // Define the middleware
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show', 'index']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bells = Bell::latest()->paginate(6);

        return view('bells.index', ['bells' => $bells]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable', 'file', 'max:2048', 'mimes:jpeg,png,jpg,gif',
        ]);

        // Store the image
        $path = null;
        if ($request->has('image')) {
            $path = Storage::disk('public')->put('bells_image', $request->image);
        }

        //Create a new bell

        Auth::user()->bells()->create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        //Redirect the user

        return back()->with('success', 'Bell has been rang successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bell $bell)
    {
        return view('bells.show', ['bell' => $bell]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bell $bell)
    {
        // Authorize the request
        Gate::authorize('modifyAny', $bell);
        // Return the view
        return view('bells.tune', ['bell' => $bell]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bell $bell)
    {
        // Authorize the request
        Gate::authorize('modifyAny', $bell);
        //validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable', 'file', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        // Store the image if available
        $path = $bell->image ?? null;
        if ($request->has('image')) {
            if ($bell->image) {
                Storage::disk('public')->delete($bell->image);
            }
            $path = Storage::disk('public')->put('bells_image', $request->image);
        }

        //Update the bell

        $bell->update([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $path,
        ]);

        //Redirect the user

        return redirect()->route('dashboard')->with('success', 'Bell has been tuned successfully!');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bell $bell)
    {
        // Authorize the request
        Gate::authorize('modifyAny', $bell);

        // Delete the image
        if ($bell->image) {
            Storage::disk('public')->delete($bell->image);
        }

        // Delete the bell
        $bell->delete();

        return back()->with('success', 'Bell has been silenced successfully!');
    }
}
