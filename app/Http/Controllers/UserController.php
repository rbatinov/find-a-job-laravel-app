<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\Company;
use App\Models\Listing;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $formFields = $request->validated();

        // Hash Password 
        $formFields['password'] = bcrypt($formFields['password']);

        // Create Company
        //$company = Company::create(['name' => 'test company']);

        //$company = Company::select('id')->where('name', 'test Company 1')->get();
//dd($company);
        //$formFields['company_id'] = $company['id'];

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect(route('home_url'))
            ->with('message', __('labels.l_user_created_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect(route('home_url'))
                ->with('message', __('labels.l_login_success'));
        }

        return back()->withErrors(['email' => __('labels.l_invalid_credentials')])->onlyInput();
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home_url'))
            ->with('message', __('labels.l_login_success'));
    }

    public function company_listings($company_id){
        //$listings = Listing::select('*')->where('company_id', $company_id)->get();

        $listings = Company::find($company_id)->listings()->get();
        
        return view('users.company_listings', ['listings' => $listings]);
    }
}
