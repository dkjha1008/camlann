<?php

namespace App\Http\Livewire\Studio;

use Livewire\Component;
use App\Models\User;
use App\Models\Tag;
use App\Models\Publication;

class Listing extends Component
{
	public $user_type, $keyword, $tag, $publication;
	public $tags, $publications, $searchData = [];
	
	public function mount()
    {
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
						})
						->whereHas('tags', function ($query) {
							if($this->tag){
								$query->where('tags_id', $this->tag);
							}
						})
						->whereHas('publicationReporter', function ($query) {
							if($this->publication){
								$query->where('publication_id', $this->publication);
							}
						})
						->get();
		
		
		$this->searchData = $data;
		
    }
	
	
    public function render()
    {
        return view('livewire.studio.listing');
    }
}
