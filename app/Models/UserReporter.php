<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserReporter extends Model
{
    use HasFactory;

    protected $appends = [
        'links_array'
    ];

    public function getlinksArrayAttribute(){
		if(@$this->links){
			return json_decode($this->links);
		}
		return [];
    }
}
