<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class ViewFeedbacksController extends Controller
{
    public function show() {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        
        return view('reports', compact('feedbacks'));
    }
}
