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
		$title = array(
			'title' => 'Home',
			'active' => 'user',
		);
		
        return view('pages.user', compact('title', 'user'));
    }

    //
    public function gameView(Game $game)
    {
		$title = array(
			'title' => 'Home',
			'active' => 'game',
		);
		
        return view('pages.game', compact('title', 'game'));
    }

    //
    public function publicationView(Publication $publication)
    {
		$title = array(
			'title' => 'Publication View',
			'active' => 'publication',
		);
		
        return view('pages.publication', compact('title', 'publication'));
    }



    
}
