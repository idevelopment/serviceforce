<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class ProfileController
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Get the profile settings for the current logged in user.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['user'] = User::find(auth()->user()->id);
        return view('profile.settings', $data);
    }

    /**
     * Update the account information.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeInformation()
    {
        return redirect()->back(302);
    }

    /**
     * Update the password.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCredentials()
    {
        return redirect()->back(302);
    }
}
