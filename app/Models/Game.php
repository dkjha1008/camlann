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

    public function getYoutubeArrayAttribute(){
		if(@$this->youtube){
			return json_decode($this->youtube);
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
	
}
