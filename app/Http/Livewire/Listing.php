<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Game;
use App\Models\Tag;

class Listing extends Component
{
	public $type=='studio', $keyword, $tag;
	public $tags, $searchData = [];
	
	public function mount()
    {
		
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
						})
						->whereHas('tags', function ($query) {
							if($this->tag){
								$query->where('tags_id', $this->tag);
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
				})
				->whereHas('gameTags', function ($query) {
					if($this->tag){
						$query->where('tags_id', $this->tag);
					}
				})
				->get();
		}
		
		$this->searchData = $data;
    }
	
    public function render()
    {
        return view('livewire.listing');
    }
}
