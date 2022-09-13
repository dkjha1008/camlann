<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Game;
use App\Models\Publication;


class PagesController extends Controller
{
    //
    public function home()
    {
		$title = array(
			'title' => 'Home',
			'active' => 'home',
		);
		
        return view('pages.home', compact('title'));
    }

    //
    public function userView(User $user)
    {
    	if(!$user){
    		abort(404);
    	}

        if($user->role=='admin'){
            abort(404);
        }


		$title = array(
			'title' => $user->name,
			'active' => 'user',
		);
		
        return view('pages.user', compact('title', 'user'));
    }

    //
    public function gameView(Game $game)
    {
    	if(!$game){
    		abort(404);
    	}

		$title = array(
			'title' => $game->title,
			'active' => 'game',
		);
		
        return view('pages.game', compact('title', 'game'));
    }

    //
    public function publicationView(Publication $publication)
    {
    	if(!$publication){
    		abort(404);
    	}

		$title = array(
			'title' => $publication->publication,
			'active' => 'publication',
		);
		
        return view('pages.publication', compact('title', 'publication'));
    }



    
}
