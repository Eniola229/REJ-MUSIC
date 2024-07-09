<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Songs;
use App\Models\User;
use App\Models\Feedback;

class CountHomeController extends Controller
{
    public function index() {
        // Count the number of records in each table
        $categoryCount = Category::count();
        $songCount = Songs::count();
        $userCount = User::count();
        $feedbackCount = Feedback::count();


        return view('dashboard', compact('categoryCount', 'songCount', 'userCount', 'feedbackCount'));
    }
}
