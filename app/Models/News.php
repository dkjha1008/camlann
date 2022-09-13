<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
	
	protected $appends = [
        'full_image'
    ];

    public function getFullImageAttribute(){
		if($this->image){
			return asset('storage/news/'.$this->image);
		}
		return '';
    }

	
	
	public function newsGames()
    {
        return $this->hasMany(NewsGames::class, 'news_id', 'id');
    }
	
}
