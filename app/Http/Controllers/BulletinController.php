<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\BulletinCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class BulletinController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = BulletinCategory::all();
        $bulletins = Bulletin::all();
        return view('bulletin.index', compact('categories', 'bulletins'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:bulletins|max:255',
            'bulletin_category' => 'required',
            'content' => 'nullable',
            'status' => 'nullable',
        ]);
        $path = "";
        if ($request->file('file')) {
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $path = $request->file('file')->storeAs(
                'avatars',
                $request->title . '.' . $extension,
                'public'
            );
        }

        Bulletin::Create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'bulletin_category_id' => $request->bulletin_category,
            'status' => $request->status,
            'file' => $path,

        ]);
        return Redirect::route('bulletin.index')->with('status', 'Information ajouté avec succes');
    }
}
