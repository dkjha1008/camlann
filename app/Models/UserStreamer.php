<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStreamer extends Model
{
    use HasFactory;

    protected $appends = [
        'links_array', 'link_videos_array'
    ];

    public function getlinksArrayAttribute(){
		if(@$this->links){
			return json_decode($this->links);
		}
		return [];
    }

    public function getlinkVideosArrayAttribute(){
        if(@$this->link_videos){
            return json_decode($this->link_videos);
        }
        return [];
    }
}
