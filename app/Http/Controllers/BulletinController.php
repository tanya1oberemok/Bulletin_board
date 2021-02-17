<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BulletinController extends Controller
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
    public function index()
    {
        $bulletins = Bulletin::where('user_id', Auth::user()->id)->paginate(20);
        return view('bulletins.bulletins', ['bulletins' => $bulletins]);
    }

    public function create()
    {
        return view('bulletins.create-bulletins');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10|string',
            'meta_info' => 'required|max:10|string',
            'description' => 'required|max:255|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if ($request->has('logo'))
        {
            $imageName = $request->logo->getClientOriginalName();
            $request->file('logo')->move('bulletins', $imageName);
            $data['logo'] = $imageName;
        }

        Bulletin::create($data);

        return redirect()->route('bulletins-all');
    }

    public function show(Bulletin $bulletin)
    {
        $comments = Comment::where('bulletin_id', $bulletin->id)->get();

        return view('bulletins.show-bulletins', [
            'bulletin' => $bulletin,
            'comments' => $comments
        ]);
    }


    public function edit(Bulletin $bulletin, Request $request)
    {
        $request->validate([
            'name' => 'required|max:10|string',
            'meta_info' => 'max:10|string',
            'description' => 'max:255|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->has('logo'))
        {
            $imageName = $request->logo->getClientOriginalName();
            $request->file('logo')->move('bulletins', $imageName);
            $data['logo'] = $imageName;
        }

        $bulletin->update($data);
        return redirect()->route('bulletins-all');
    }

    public function destroy(Bulletin $bulletin)
    {
        $bulletin->delete();
        return redirect()->route('bulletins-all');
    }
}
