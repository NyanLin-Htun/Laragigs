<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index()       
    {
        return view('index', [
            'listings' => Listing::all()
        ]);
    }
    public function show($id)
    {
        return view('/show',[
            'listing' => Listing::findOrFail($id)
        ]);
    }
}
