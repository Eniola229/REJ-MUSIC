<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class AddCateController extends Controller
{
    public function store(Request $request)
    {
     try {
        // Validate the request data
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'discription' => ['required', 'string'],  
        ]);

        $add = Category::create($validated);

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Category Added Successfully');
    } 
        catch (Exception $e) {
            // Redirect back with an error message if an exception occurs
            return redirect()->back()->with('error', 'Failed to add category: ' . $e->getMessage());
    }
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer'
        ]);

        $cateId = $request->input('category_id');
        $category = Category::find($cateId);

        if ($category) {
            $category->delete();
            return redirect()->back()->with('status', 'Category Successfully Deleted');
        } else {
            return redirect()->back()->with('error', 'Category Not Found');
        }
    }
}
