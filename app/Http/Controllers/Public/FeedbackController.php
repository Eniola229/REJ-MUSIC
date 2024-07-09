<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
        public function store(Request $request)
        {
         try {
            // Validate the request data
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'email'],
                'subject' => ['required', 'string', 'max:255'],  
                'message' => ['required', 'string', 'max:255']  
            ]);

            $add = Feedback::create($validated);

            // Redirect back with a success message
            return redirect()->back()->with('status', 'We have recived your message, we will give you feed back soon');
        } 
            catch (Exception $e) {
                // Redirect back with an error message if an exception occurs
                return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
        }

}
