<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('profile.home', ['user' => $user]);
    }

    public function show()
    {
        $user = Auth::user();
        return view('profile.edit_info', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'last_name' => 'max:255|string',
            'email' => 'email',
            'age' => 'integer',
            'address' => 'max:255|string',
            'phone_number' => 'max:255|string',
            'gender' => 'max:255|string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = $request->user();
        $data = $request->except(['_token', '_method']);

        if ($request->has('photo'))
        {
            $imageName = $request->photo->getClientOriginalName();
            $request->file('photo')->move('images', $imageName);
            $data['photo'] = $imageName;
        }
        $user->forceFill($data);
        $user->update();

        return redirect()->route('home');
    }
}
