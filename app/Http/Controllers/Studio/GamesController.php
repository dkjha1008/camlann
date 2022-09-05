<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Game;

class GamesController extends Controller
{
    //
    public function index()
    {
		$title = array(
			'title' => 'Game Profile',
			'active' => 'games',
		);
		
		$user = auth()->user();
		
        return view('studio.games.index', compact('user', 'title'));
    }
	
	
    public function create()
    {
		$title = array(
			'title' => 'Game Profile',
			'active' => 'games',
		);
		
		$user = auth()->user();
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('studio.games.create', compact('user', 'title', 'tags'));
    }
	
	
	public function store(Request $request)
    {
		dd($request->all());
		$request->validate([
            'title' => 'required|max:255',
            //'image' => 'required',
            'tags' => 'required',
            'comps' => 'required',
            //'screenshots' => 'required',
            'youtube' => 'required',
        ]);
		
		$store = new Game;
		$store->users_id = auth()->user()->id;
		$store->title = $request->title;
		$store->image = $request->image;
		$store->comps = $request->comps;
		$store->youtube = $request->youtube;
		$store->attach_files = $request->attach_files;
		$store->playable_demo = $request->playable_demo;
		$store->playable_demo_exe = $request->playable_demo_exe;
		$store->save();
		
		
		//$store->tags = $request->tags;
		
		//Session::flash('success', 'Profile updated successfully');
        return redirect()->route('studio.games');
    }
	
	
	
}
