<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
	
	protected $appends = [
        'profile_pic'
    ];
	
	public function getProfilePicAttribute(){
		if($this->image){
			return asset('storage/images/'.$this->image);
		}
		return asset('assets/images/sample-img.png');
    }
	
	
	public function reporters()
    {
        return $this->hasMany(PublicationReporter::class, 'publication_id', 'id');
    }
}
