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
        $this->middleware('lang');
    }


    /**
     * Get the profile settings for the current logged in user.
     * 
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data['query'] = User::find(auth()->user()->id);
        return view('profile.settings', $data);
    }

    /**
     * Update the account information.
     *
     * @param  Requests\AccountInfoValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeInformation(Requests\AccountInfoValidator $input)
    {
        $id = auth()->user()->id;
        User::find($id)->update($input->except('_token'));
        session()->flash('mesage', 'Profile information saved');
        return redirect()->back(302);
    }

    /**
     * Update the password.
     *
     * @param  Requests\PasswordValidator $input
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCredentials(Requests\PasswordValidator $input)
    {
        $id = auth()->user()->id; 
        $data = ['_token', 'password_confirmation'];

        User::find($id)->update($data);
        session()->flash('message', 'Your password is updated');
        return redirect()->back(302);
    }
}
