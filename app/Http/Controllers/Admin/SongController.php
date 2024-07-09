<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Show the form for uploading a song.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store the uploaded song.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // public function store(Request $request)
    // {
    //     // Validate the request
    //     $request->validate([
    //         'songTitle' => 'required|string|max:255',
    //         'artistName' => 'required|string|max:255',
    //         'albumName' => 'nullable|string|max:255',
    //         'genre' => 'nullable|string|max:255',
    //         'releaseDate' => 'nullable|date',
    //         'songFile' => 'required|file|mimes:mp3,wav,ogg|max:20480', // Max 20MB
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('songFile')) {
    //         $file = $request->file('songFile');
    //         $filePath = $file->store('songs', 'public');

    //         // Save song details to the database
    //         Song::create([
    //             'title' => $request->input('songTitle'),
    //             'artist' => $request->input('artistName'),
    //             'album' => $request->input('albumName'),
    //             'genre' => $request->input('genre'),
    //             'release_date' => $request->input('releaseDate'),
    //             'file_path' => $filePath,
    //         ]);

    //         return back()->with('success', 'Song uploaded successfully!');
    //     }

    //     return back()->with('error', 'Failed to upload the song.');
    // }
}
