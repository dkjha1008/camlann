<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Tag;

class GameTags extends Component
{
	use LivewireAlert;

    public $tags = [];

	public $title;
	
	public $name;
	public $status = '1';

    public $tagId;
    protected $listeners = ['confirmedAction'];
	
	
	public function resetFields()
    {
        $this->name = '';
        $this->status = '1';
        $this->tagId = '';
    }

    public function rules()
	{
		return [
			'name' => 'required|max:255',
			'status' => 'required',
		];
	}

    public function store()
    {
        $this->validate();

        $store = new Tag;
        if($this->tagId){
            $store->id = $this->tagId;
            $store->exists = true;
        }
        $store->name = $this->name;
        $store->status = $this->status;
        $store->save();

        $this->alert('success', 'Tag added');
        $this->emit('tagFormClose');
        $this->resetFields();
    }


    public function edit($id)
	{
        $this->resetFields();
        $this->tagId = $id;
        $data = Tag::findOrFail($this->tagId);

        $this->name = $data->name;
        $this->status = $data->status;

        $this->emit('tagFormShow');
    }


    public function delete($id)
	{
        $this->tagId = $id;

		$this->alert('warning', 'Are you sure', [
			'toast' => false,
			'position' => 'center',
			'showCancelButton' => true,
			'cancelButtonText' => 'Cancel',
			'showConfirmButton' => true,
			'confirmButtonText' => 'Yes',
			'onConfirmed' => 'confirmedAction',
			'allowOutsideClick' => false,
			'timer' => null
		]);		
	}
	
	public function confirmedAction()
    {
        $data = Tag::findOrFail($this->tagId);

        $data->delete();
        $this->alert('success', 'Tag deleted');
        $this->resetFields();
    }
	
	
    public function render()
    {
        $this->tags = Tag::all();
        return view('livewire.admin.game-tags');
    }
}
