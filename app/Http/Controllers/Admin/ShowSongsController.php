<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Songs;
use App\Models\Category;

class ShowSongsController extends Controller
{

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'songTitle' => 'required|string|max:255',
            'artistName' => 'required|string|max:255',
            'albumName' => 'nullable|string|max:255',
            'genre' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'discription' => 'required|string',
            'releaseDate' => 'nullable|date',
            'songFile' => 'required|file|mimes:mp3,wav,ogg|max:20480', // Max 20MB
            'coverImage' => 'required', 'image', 'max:2048',
        ]);

        // Handle cover upload and resizing
         if ($request->hasFile('coverImage')) {
            $coverFile = $request->file('coverImage');
            $coverSize = $coverFile->getSize();

            // Check if the cover exceeds 2MB
            if ($coverSize > 2048000) { // 2MB in bytes (1 MB = 1024 KB = 1024 * 1024 bytes)
                // Resize the image to reduce file size
                $image = Image::make($coverFile)->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

                // Store the resized cover
                 $coverPath = $request->file('coverImage')->store('public/coverImages');
                 $coverPath = str_replace('public/', '', $coverPath);
            } else {
                // cover is within 2MB size limit, store it as usual
                $coverPath = $request->file('coverImage')->store('public/coverImages');
                $coverPath = str_replace('public/', '', $coverPath);
            }
         }

        // Handle file upload
        if ($request->hasFile('songFile')) {
            $file = $request->file('songFile');
            $filePath = $file->store('songFile', 'public');

            // Save song details to the database
            Songs::create([
                'title' => $request->input('songTitle'),
                'artist' => $request->input('artistName'),
                'album' => $request->input('albumName'),
                'genre' => $request->input('genre'),
                'category' => $request->input('category'),
                'discription' => $request->input('discription'),
                'release_date' => $request->input('releaseDate'),
                'file_path' => $filePath,
                'coverPath' => $coverPath,
            ]);

            return back()->with('status', 'Song uploaded successfully!');
        }

        return back()->with('error', 'Failed to upload the song.');
    }

    public function show(Request $request)
    {
        $songs = Songs::orderBy('created_at', 'desc')->get();
        $categories = Category::orderBy('created_at', 'desc')->get();
        
        return view('addsong', compact('songs', 'categories'));
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'song_id' => 'required|integer'
        ]);

        $songId = $request->input('song_id');
        $song = Songs::find($songId);

        if ($song) {
            $song->delete();
            return redirect()->back()->with('status', 'Song Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'Song Not Found');
        }
    }
}
