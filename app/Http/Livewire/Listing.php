<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactNotification;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\User;
use App\Models\Game;
use App\Models\Tag;
use App\Models\Favourite;
use App\Models\Contact;
use App\Models\FavouriteGame;

class Listing extends Component
{
	use LivewireAlert;

	public $user;
	public $type='studio', $keyword, $tag;
	public $tags, $searchData = [], $favourites, $favouriteGames;
	
	public $selectUser;
	public $message;
	
	public function mount()
    {
    	$this->user = auth()->user();
		
		if(request()->keyword){
			$this->keyword = request()->keyword;
		}
		if(request()->type){
			$this->type = request()->type;
		}
		
		$this->tags = Tag::whereStatus('1')->get();
		
		//init search
		$this->search();
	}
	
	public function search()
    {
		$data = [];
		if($this->type == 'studio'){
			$data = User::whereRole('studio')
						->where(function ($query) {
							if($this->keyword){
								$query->where('first_name', 'like', '%'.$this->keyword.'%');
								$query->orWhere('last_name', 'like', '%'.$this->keyword.'%');
								$query->orWhere('email', 'like', '%'.$this->keyword.'%');
							}

							if($this->tag){
								$query->whereHas('tags', function ($que) {
									if($this->tag){
										$que->where('tags_id', $this->tag);
									}
								});
							}
						})
						->get();
		
		}
		else {
			$data = Game::query()
				->where(function ($query) {
					if($this->keyword){
						$query->where('title', 'like', '%'.$this->keyword.'%');
						$query->orWhere('comps', 'like', '%'.$this->keyword.'%');
					}
					if($this->tag){
						$query->whereHas('gameTags', function ($que) {
							if($this->tag){
								$que->where('tags_id', $this->tag);
							}
						});
					}
				})
				->get();
		}
		
		$this->searchData = $data;


		//...
    	$url = route($this->user->role .'.listing', [
			'type' => $this->type,
			'keyword' => $this->keyword,
			'tag' => $this->tag
		]);

    	$this->emit('urlChange', $url);
    }


    public function favourite($user){

    	$store = new Favourite;
    	$store->user_id = $this->user->id;
    	$store->fav_users_id = $user;
    	$store->save();

    	$this->alert('success', 'Favourite added');
    }

    public function unfavourite($user){

    	$fav = Favourite::where('user_id', $this->user->id)->where('fav_users_id', $user)->first();
    	
    	if(@$fav){
	    	$fav->delete();
	    	$this->alert('success', 'Un-favourite done');
    	}
    	else {
    		$this->alert('error', 'Invalid Request');
    	}
    }





    public function favouriteGame($game){

    	$store = new FavouriteGame;
    	$store->user_id = $this->user->id;
    	$store->games_id = $game;
    	$store->save();

    	$this->alert('success', 'Favourite added');
    }

    public function unfavouriteGame($game){

    	$fav = FavouriteGame::where('user_id', $this->user->id)->where('games_id', $game)->first();
    	
    	if(@$fav){
	    	$fav->delete();
	    	$this->alert('success', 'Un-favourite done');
    	}
    	else {
    		$this->alert('error', 'Invalid Request');
    	}
    }



	//...
    public function emptyField(){
    	$this->selectUser = '';
    	$this->message = '';
    }

    public function contactModal($selectUser){
    	$this->emptyField();

    	$this->selectUser = $selectUser;
    	$this->emit('showModal');
    }

    public function sendMessage(){
    	$contact = new Contact; 
        $contact->user_id = $this->user->id; 
        $contact->reciever_id = $this->selectUser; 
        $contact->message = $this->message; 
        $contact->save(); 

        
        try{
			$userData = User::find($this->selectUser);
			// dd($userData);
			Notification::route('mail', $userData->email)
				->notify(new ContactNotification($userData, $this->user, $this->message));
		} catch(Exception $e) { }


        $this->emptyField();
    	$this->emit('closeModal');
    	$this->alert('success', 'Message Send');
    }

	
    public function render()
    {
    	$this->favourites = $this->user->favourite()->pluck('fav_users_id')->toArray();

    	$this->favouriteGames = $this->user->favouriteGames()->pluck('games_id')->toArray();

        return view('livewire.listing');
    }
}
