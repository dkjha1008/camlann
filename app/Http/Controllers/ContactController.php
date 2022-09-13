<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactNotification;

use App\Models\user;
use App\Models\Contact;
use App\Models\Favourite;
use App\Models\FavouriteGame;

class ContactController extends Controller
{
	use LivewireAlert;

    public function index()
    {
		$title = array(
			'title' => 'Contact us',
			'active' => 'contact'
		);

		$user = auth()->user();


		$sender = Contact::where('user_id', $user->id)->select('reciever_id')->groupBY('reciever_id')->get()->toArray();

		$rec = Contact::where('reciever_id', $user->id)->select('user_id')->groupBY('user_id')->get()->toArray();

		$usersArray = array_merge($sender, $rec);


		$users = User::whereIn('id', $usersArray)->get();
		
		
        return view('pages.contact.index', compact('title', 'user', 'users'));
    }


    public function show(Request $request, User $user)
    {
    	$title = array(
			'title' => 'Contact us',
			'active' => 'contact'
		);

    	$authUser = auth()->user();

    	$threads = Contact::query()
			    	->where(function($query) use ($user, $authUser) {
			    		$query->where('user_id', $user->id);
			    		$query->where('reciever_id', $authUser->id);
			    	})
			    	->orWhere(function($query) use ($user, $authUser) {
			    		$query->where('reciever_id', $user->id);
			    		$query->where('user_id', $authUser->id);
			    	})
			    	->get();

    	return view('pages.contact.show', compact('title', 'user', 'threads'));
    }


    public function store(Request $request, User $user)
	{ 
		
		$request->validate([
			'message' => 'required',
        ]);
		
		$authUser = auth()->user();
		
        $contact = new Contact; 
        $contact->user_id = $authUser->id; 
        $contact->reciever_id = $user->id; 
        $contact->message = $request->message; 
        $contact->save(); 
		
		
		try{
			Notification::route('mail', $userData->email)
				->notify(new ContactNotification($user, $authUser, $request->message));
		} catch(Exception $e) { }


		$this->flash('success', 'Message send successfully');
        return redirect()->back();
	}





	public function favouriteAction($user){

		$userAuth = auth()->user();

    	$fav = Favourite::where('user_id', $userAuth->id)->where('fav_users_id', $user)->first();
    	
    	if(@$fav){
	    	$fav->delete();
	    	$this->flash('success', 'Un-favourite done');
    	}
    	else {
    		$store = new Favourite;
	    	$store->user_id = $userAuth->id;
	    	$store->fav_users_id = $user;
	    	$store->save();

	    	$this->flash('success', 'Favourite added');
    	}

    	return redirect()->back();
    }


    public function favouriteGameAction($game){

		$userAuth = auth()->user();

    	$fav = FavouriteGame::where('user_id', $userAuth->id)->where('games_id', $game)->first();
    	
    	if(@$fav){
	    	$fav->delete();
	    	$this->flash('success', 'Un-favourite done');
    	}
    	else {
    		$store = new FavouriteGame;
	    	$store->user_id = $userAuth->id;
	    	$store->games_id = $game;
	    	$store->save();

	    	$this->flash('success', 'Favourite added');
    	}

    	return redirect()->back();
    }



}
