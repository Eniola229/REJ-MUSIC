<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Songs; 
use Carbon\Carbon;

class EventController extends Controller
{
    public function show(Request $request)
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        //THis contorller is to view songs that where uplaoded a week ago
        $oneWeekAgo = Carbon::now()->subWeek();
        $songs = Songs::where('created_at', '>=', $oneWeekAgo)->get();
        
        //To view songs that where uploaded one month agao
        $oneMonthAgo = Carbon::now()->subMonth();
        $newhits = Songs::where('created_at', '>=', $oneMonthAgo)->get();

        $artists = Songs::select('artist')->distinct()->get();

       return view('events', compact('categories', 'songs', 'newhits', 'artists'));
    }
}
