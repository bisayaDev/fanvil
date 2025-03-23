<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SebastianBergmann\Environment\Console;

class ListingController extends Controller
{
    private $subjects = [
    'REVIEW MATERIALS 2022',
     'CRIMINAL JURISPRUDENCE. PROCEDURE AND EVIDENCE',
    'LAW ENFORCEMENT ADMINISTRATION',
    'CRIMINALISTICS',
    'CRIME DETECTION AND INVESTIGATION',
    'SOCIOLOGY OF CRIMES AND ETHICS',
    'CORRECTIONAL ADMINISTRATION',
    'REVIEW MATERIALS 2024 (NEW CURRICULUM)'
    
];

    // Show all listings
    public function index() {
        //dd(Listing::latest()->filter(request(['subject','search']))->paginate(6));
        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['subject','search']))->paginate(6),
            'subjects'=>$this->subjects
        ]);
    }

    //Show single listing
    public function show(Listing $listing) {
        
        return view('listings.show', [
            'listing' => $listing,
            'subjects'=>$this->subjects
        ]);
    }

    // Show Create Form
    public function create() {
        
        return view('listings.create', ["subjects"=>$this->subjects]);
    }

    // Store Listing Data
    public function store(Request $request) {
        $formFields = $request->validate([
            'lesson_name' => 'required',
            'subject' => 'required',
            'website' => 'required',
        ]);

        if(isset($request->description)){
            $formFields['description'] = $request->description;
        }else{
            $formFields['description'] = "";
        }
        
        
        if(isset($request->video)) {
            $formFields['video'] = 1;
        }else{
            $formFields['video'] = 0;
        }

        $formFields['user_id'] = auth()->id();

        Listing::create($formFields);
        return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit(Listing $listing) {
        
        return view('listings.edit', ['listing' => $listing,'subjects' => $this->subjects]);
        //return view('listings.edit', compact('subjects','listing'));
    }

    // Update Listing Data
    public function update(Request $request, Listing $listing) {
        // Make sure logged in user is owner
        
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $formFields = $request->validate([
            'lesson_name' => 'required',
            'subject' => 'required',
            'website' => 'required',
            
        ]);

        if(isset($request->description)){
            $formFields['description'] = $request->description;
        }else{
            $formFields['description'] = "";
        }
        
        if(isset($request->video)) {
            $formFields['video'] = 1;
        }else{
            $formFields['video'] = 0;
        }
        
        $listing->update($formFields);
        return redirect('/')->with('message', 'Listing updated successfully!');
    }

    // Delete Listing
    public function destroy(Listing $listing) {
        // Make sure logged in user is owner
        if($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
        
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }


    //View the doc File
    public function view(Listing $listing) {
        
        return view('listings.view', [
            'listing' => $listing
        ]);
    }

    //Watch the lesson File
    public function watch(Listing $listing) {
        
        return view('listings.watch', [
            'listing' => $listing
        ]);
    }
}
