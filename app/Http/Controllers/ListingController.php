<?php

namespace App\Http\Controllers;

use App\Models\Listing;
// use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function index()       
    {
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(2)
        ]);
    }
    public function show(Listing $listing)
    {
        return view('listings.show',[
            'listing' => $listing
        ]);
    }
    public function create()
    {
        return view('listings.create');
    }
    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings','company')],
            'location' => 'required',
            'email' => ['required','email'],
            'website'=> 'required',
            'tags' => 'required',
            'description'=> 'required'
        ]);

        if(request()->hasFile('logo')){
            $formFields['logo'] = request()->file('logo')->store('logos','public');
        }

        $formFields['user_id'] = auth()->id();
        
        Listing::create($formFields);
        // dd($formFields['logo']);

        return redirect('/')->with('message','Listing Created Successfully');
    }
    public function edit(Listing $listing)
    {
        return view('listings.edit',[
            'listing' => $listing
        ]);
    }
    public function update(Listing $listing)
    {
        //Make Sure Logged in user is Owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $updateFields = request()->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'email' => ['required','email'],
            'website'=> 'required',
            'tags' => 'required',
            'description'=> 'required'
        ]);

        if(request()->hasFile('logo')){
            $updateFields['logo'] = request()->file('logo')->store('logos','public');
        }
        
        $listing->update($updateFields);
        return redirect('/')->with('message','Listing Updated Successfully');
    }
    public function destroy(Listing $listing)        
    {
        //Make Sure Logged in user is Owner
        if($listing->user_id != auth()->id()){
            abort(403,'Unauthorized Action');
        }
        $listing->delete();
        return redirect('/')->with('message','Deleted Listing Successfully');
    }
    public function manage()
    {
        return view('listings.manage', [
            'listingsmanage' => auth()->user()->listings()->get()
        ]);
    }
}
