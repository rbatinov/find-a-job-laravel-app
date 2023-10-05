<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Listing;
use Illuminate\Validation\Rule;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listings.index', [
            'heading' => 'Latest Listings', 
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'listings.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreListingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreListingRequest $request)
    {
        $formFields = $request->validated();

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::select('id')->where('name', $formFields['company'])->get();
        
        if(!$company->isEmpty()){
            // dd($company[0]->id);
            $formFields['company_id'] = $company[0]->id;
        }
        else {
            $newCompany = Company::create([
                'name' => $formFields['company']
            ]);

            $formFields['company_id'] = $newCompany->id;
        }

        $formFields['user_id'] = auth()->user()->id;

        Listing::create($formFields);

        return redirect(route('home_url'))
            ->with('message', __('labels.l_listing_created_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
//dd($listing->company->name);
        if($listing){
            return view('listings.show', [
                'listing' => $listing       
            ]);
        }
        else{
            // abort('404', 'No such job post');
            return 'No such job post';
        }
    }


    public function company(Listing $listing)
    {

        if($listing){
            return view('listings.company', [
                'listing' => $listing       
            ]);
        }
        else{
            // abort('404', 'No such job post');
            return 'No such job post';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        // Make sure user is owner
        if($listing->user_id != auth()->user()->id){
            return redirect(route('home_url'))->with('message', __('locals.l_authentication_listing'));
        }

        if($listing){
            return view('listings.edit', [
                'listing' => $listing       
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateListingRequest  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateListingRequest $request, Listing $listing)
    {
        // Make sure user is owner
        if($listing->user_id != auth()->user()->id){
            return redirect(route('home_url'))->with('message', __('locals.l_authentication_listing'));
        }

        $formFields = $request->validated();

        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

        $company = Company::select('id')->where('name', $formFields['company'])->get();
        if(!$company->isEmpty()){ // company exists
            // check if it is the same
            if($company[0]->id != $formFields['company_id']){ // new company inserted
                $formFields['company_id'] = $company[0]->id;
            }
        }
        else { // company does not exists -> create new one
            $newCompany = Company::create([
                'name' => $formFields['company']
            ]);

            $formFields['company_id'] = $newCompany->id;
        }
        
        $listing->update($formFields);

        return redirect(route('home_url'))
            ->with('message', __('labels.l_listing_updated_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        // Make sure user is owner
        if($listing->user_id != auth()->user()->id){
            abort('403', 'Unauthorized action!');
        }
        
        $listing->delete();

        return redirect(route('home_url'))
            ->with('message', __('labels.l_listing_deleted_success'));
    }


    public function manage()
    {
        // it gives error but the method exists and returns data
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }
}
