<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
	
	protected $appends = [
        'youtube_array', 'full_image', 'full_screenshort', 'full_attach_files', 'full_exe'
    ];

    public function getYoutubeAttribute($value){
		if(@$value){
			return json_decode($value);
		}
		return ''; 
    }

    public function getYoutubeArrayAttribute(){
		if(@$this->youtube){
			//$data = json_decode($this->youtube);
			$data = $this->youtube;
			$newArray = [];
			foreach($data as $url){				
				parse_str(parse_url($url, PHP_URL_QUERY), $result);
				if(@$result['v']){

					$link = 'https://www.youtube.com/embed/'. $result['v'];
					array_push($newArray, $link);
				}
			}

			return $newArray;
		}
		return [];
    }

    public function getFullImageAttribute(){
		if(@$this->image){
			return asset('storage/games/'.$this->image);
		}
		return '';
    }
	
	
	public function getFullScreenshortAttribute(){
		if(@$this->screenshots){
			$imgs = json_decode($this->screenshots);
			$data = [];
			if(@$imgs){
				foreach($imgs as $img){
					array_push($data, asset('storage/screenshorts/'.$img));
				}
			}
			return $data;
		}
		return '';
    }

	
	
	public function getFullAttachFilesAttribute(){
		if(@$this->attach_files){
			return asset('storage/files/'.$this->attach_files);
		}
		return '';
    }
	
	public function getFullExeAttribute(){
		if(@$this->playable_demo_exe){
			return asset('storage/files/'.$this->playable_demo_exe);
		}
		return '';
    }
	
	
	
	
	
	public function gameTags()
    {
        return $this->hasMany(GameTag::class, 'games_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
	
}
