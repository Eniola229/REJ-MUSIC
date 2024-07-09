<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class ShowCateController extends Controller
{
    public function show(Request $request)
    {
        $categores = Category::orderBy('created_at', 'desc')->get();
        
        return view('addcate', compact('categores'));
    }
}
