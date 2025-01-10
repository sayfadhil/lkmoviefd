<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genre')->get(); // Mengambil semua movie beserta genre-nya
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all(); // Mengambil semua genre
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|string',
            'year' => 'required|numeric|digits:4',
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($request->all()); // Menyimpan data movie ke database

        return redirect()->route('movies.index')->with('success', 'Movie berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movie = Movie::findOrFail($id); // Mengambil movie berdasarkan ID
        $genres = Genre::all(); // Mengambil semua genre
        return view('movies.edit', compact('movie', 'genres')); // Mengirim data ke view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|string',
            'year' => 'required|numeric|digits:4',
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);
    
        $movie = Movie::findOrFail($id); // Mengambil movie berdasarkan ID
        $movie->update($request->all()); // Memperbarui data movie
    
        return redirect()->route('movies.index')->with('success', 'Movie berhasil diperbarui.'); // Redirect setelah update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::findOrFail($id); // Mengambil movie berdasarkan ID
        $movie->delete(); // Menghapus movie
    
        return redirect()->route('movies.index')->with('success', 'Movie berhasil dihapus.'); // Redirect setelah delete
    }
}
