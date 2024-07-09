<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Songs;

class ShowSingleSongsController extends Controller
{
    public function show($id)
    {
        // Retrieve the doctor/AddPatient with the given ID
        $song = Songs::find($id);

        // Check if song exists
        if (!$song) {
            return redirect()->back()->with('error', 'song not found');
        }

        // Return the view with song details
        return view('viewspecificsong', compact('song'));
    }
}
 