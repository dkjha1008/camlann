<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;

use App\Models\{
    Tag,
    Game,
    GameTag,
};


class GamesController extends Controller
{
    //
    public function index()
    {
		$title = array(
			'title' => 'Game Profile',
			'active' => 'games',
		);
		
		$user = auth()->user();
		
		$games = $user->games;
		
        return view('studio.games.index', compact('user', 'title', 'games'));
    }
	
	
    public function create()
    {
		$title = array(
			'title' => 'Game Profile',
			'active' => 'games',
		);
		
		$user = auth()->user();
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('studio.games.create', compact('user', 'title', 'tags'));
    }
	
	
	public function store(Request $request)
    {
		$request->validate([
            'title' => 'required|max:255',
            'image' => 'required',
            'tags' => 'required',
            'comps' => 'required',
            //'screenshots' => 'required',
            'youtube' => 'required',
        ]);
		
		$user = auth()->user();
		
		
		$store = new Game;
		$store->users_id = $user->id;
		$store->title = $request->title;
		$store->slug = Str::slug($request->title);
		
		
		if($request->image && strpos($request->image, "data:") !== false) {
			$image = $request->image;
			
            $folderPath = ('storage/games/');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0775, true);
                chown($folderPath, exec('whoami'));
            }

            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_base64 = base64_decode($image_parts[1]?? null) ?? null;
            $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
            $imageFullPath = $folderPath.$file_name;
            file_put_contents($imageFullPath, $image_base64);
            
			//...
			$store->image = $file_name;
        }
		

		if(@$request->screenshots){
			$store->screenshots = json_encode($request->screenshots);
		}
	
		
		$store->comps = $request->comps;
		$store->youtube = $request->youtube;
		
		if ($request->hasFile('attach_files')){
			$path = 'uploads/files/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$file = $request->file('attach_files');
			$filenameAttachment = $user->id . '-' . uniqid(time()) . '.' . $file->getClientOriginalExtension();
			$request->file('attach_files')->move($path, $filenameAttachment);
			
			
			$store->attach_files = $filenameAttachment;
		}
		
		$store->playable_demo = $request->playable_demo;
		
		
		if ($request->hasFile('playable_demo_exe')){
			$path = 'uploads/files/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$file = $request->file('playable_demo_exe');
			$filenameExe = $user->id . '-' . uniqid(time()) . '.' . $file->getClientOriginalExtension();
			$request->file('playable_demo_exe')->move($path, $filenameExe);
			
			
			$store->playable_demo_exe = $filenameExe;
		}
		
		
		$store->status = $request->status;
		$store->save();
		
		
		
		//...GameTag
		if($request->tags){
            foreach($request->tags as $tag){
                if(@$tag){
                    $checkTags = GameTag::where('games_id', $store->id)->where('tags_id', $tag)->first();

                    $storeTag = new GameTag;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->games_id = $store->id;
                    $storeTag->tags_id = $tag;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteTags = GameTag::where('games_id', $store->id)->whereNotIn('tags_id', $request->tags)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		//$store->tags = $request->tags;
		
		//Session::flash('success', 'Profile updated successfully');
        return redirect()->route('studio.games');
    }
	
	
	public function edit(Game $game)
    {
		$title = array(
			'title' => 'Game Profile',
			'active' => 'games',
		);
		
		$user = auth()->user();
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('studio.games.edit', compact('user', 'title', 'tags', 'game'));
    }
	
	
	public function update(Request $request, Game $game)
    {
		$request->validate([
            'title' => 'required|max:255',
            //'image' => 'required',
            'tags' => 'required',
            'comps' => 'required',
            //'screenshots' => 'required',
            'youtube' => 'required',
        ]);
		
		$user = auth()->user();
		
		
		$game->users_id = $user->id;
		$game->title = $request->title;
		$game->slug = Str::slug($request->title);
		
		
		if($request->image && strpos($request->image, "data:") !== false) {
			$image = $request->image;
			
            $folderPath = ('storage/games/');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0775, true);
                chown($folderPath, exec('whoami'));
            }

            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_base64 = base64_decode($image_parts[1]?? null) ?? null;
            $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
            $imageFullPath = $folderPath.$file_name;
            file_put_contents($imageFullPath, $image_base64);
            
			//...
			$game->image = $file_name;
        }
		

		if(@$request->screenshots){
			$game->screenshots = json_encode($request->screenshots);
		}
	
		
		$game->comps = $request->comps;
		$game->youtube = $request->youtube;
		
		if ($request->hasFile('attach_files')){
			$path = 'uploads/files/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$file = $request->file('attach_files');
			$filenameAttachment = $user->id . '-' . uniqid(time()) . '.' . $file->getClientOriginalExtension();
			$request->file('attach_files')->move($path, $filenameAttachment);
			
			
			$game->attach_files = $filenameAttachment;
		}
		
		$game->playable_demo = $request->playable_demo;
		
		
		if ($request->hasFile('playable_demo_exe')){
			$path = 'uploads/files/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$file = $request->file('playable_demo_exe');
			$filenameExe = $user->id . '-' . uniqid(time()) . '.' . $file->getClientOriginalExtension();
			$request->file('playable_demo_exe')->move($path, $filenameExe);
			
			
			$game->playable_demo_exe = $filenameExe;
		}
		
		
		$game->status = $request->status;
		$game->save();
		
		
		
		//...GameTag
		if($request->tags){
            foreach($request->tags as $tag){
                if(@$tag){
                    $checkTags = GameTag::where('games_id', $game->id)->where('tags_id', $tag)->first();

                    $storeTag = new GameTag;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->games_id = $game->id;
                    $storeTag->tags_id = $tag;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteTags = GameTag::where('games_id', $game->id)->whereNotIn('tags_id', $request->tags)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		//$store->tags = $request->tags;
		
		//Session::flash('success', 'Profile updated successfully');
        return redirect()->route('studio.games');
    }
}
