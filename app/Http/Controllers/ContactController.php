<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\user;
use App\Models\Contact;

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
		
		
		$this->flash('success', 'Message send successfully');
        return redirect()->back();
	}



}
