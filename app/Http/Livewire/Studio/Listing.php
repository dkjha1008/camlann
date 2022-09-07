<?php

namespace App\Http\Livewire\Studio;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use App\Models\Tag;
use App\Models\Publication;
use App\Models\Favourite;
use App\Models\Contact;

class Listing extends Component
{
	use LivewireAlert;

	public $user;
	public $user_type, $keyword, $tag, $publication;
	public $tags, $publications, $searchData = [], $favourites;
	
	public $selectUser;
	public $message;


	public function mount()
    {
    	$this->user = auth()->user();

		if(request()->user_type){
			$this->user_type = request()->user_type;
		}
		
		if(request()->keyword){
			$this->keyword = request()->keyword;
		}
		
		$this->tags = Tag::whereStatus('1')->get();
		$this->publications = Publication::whereStatus('1')->get();
		
		
		//init search
		$this->search();
	}
	
	public function search()
    {
        $data = User::whereRole($this->user_type)
						->where(function ($query) {
							if($this->keyword){
								$query->where('first_name', 'like', '%'.$this->keyword.'%');
								$query->orWhere('last_name', 'like', '%'.$this->keyword.'%');
								$query->orWhere('email', 'like', '%'.$this->keyword.'%');
							}
							
							//if($this->user_type=='reporter') {
								$query->whereHas('publicationReporter', function ($que) {
									if($this->publication){
										$que->where('publication_id', $this->publication);
									}
								});
							//}
						
						})
						->whereHas('tags', function ($query) {
							if($this->tag){
								$query->where('tags_id', $this->tag);
							}
						})
						->get();
		
		
		$this->searchData = $data;
		
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

        //Mail::to($request->email)->send(new ContactMail($name, $contact));

        $this->emptyField();
    	$this->emit('closeModal');
    	$this->alert('success', 'Message Send');
    }


	
	
    public function render()
    {
    	$this->favourites = $this->user->favourite()->pluck('fav_users_id')->toArray();

        return view('livewire.studio.listing');
    }
}
