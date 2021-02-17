<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainPageController extends Controller
{

    public function index()
    {
        $bulletins = Bulletin::query()->paginate(20);
        return view('main_pages.welcome', ['bulletins' => $bulletins]);
    }

    public function show(Bulletin $bulletin)
    {
        $comments = Comment::where('bulletin_id', $bulletin->id)->get();

        return view('main_pages.show-welcome', [
            'bulletin' => $bulletin,
            'comments' => $comments
        ]);
    }


    public function addComment(Request $request, Bulletin $bulletin)
    {
        $data = $request->all();
        $data['bulletin_id'] = $bulletin->id;

        if (Auth::user()) {
            $data['user_id'] = Auth::id();
        }
        Comment::create($data);

        return redirect()->route('show', $bulletin->id);
    }

    public function postStar (Request $request, Bulletin $bulletin) {

        $rating = new Rating;

        if (Auth::user()) {
            $rating->user_id = Auth::id();
        }
        $rating->rating = $request->input('star');

        $bulletin->ratings()->save($rating);

        return redirect()->route('show', $bulletin->id);
    }
}
