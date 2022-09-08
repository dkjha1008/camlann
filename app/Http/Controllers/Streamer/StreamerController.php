<?php

namespace App\Http\Controllers\Streamer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Tag;
use App\Models\UserStreamer;
use App\Models\UserTags;

class StreamerController extends Controller
{
	use LivewireAlert;
	
    //
    public function index()
    {
		$title = array(
			'title' => 'Streamer',
			'active' => 'streamer',
		);
		
		$user = auth()->user();
		
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('streamer.profile.index', compact('user', 'title', 'tags'));
    }
	
	//
    public function store(Request $request)
    {
		$request->validate([
            'twitter' => 'required|max:255',
            'youtube_channel' => 'required|max:255',
            'twitch_channel' => 'required|max:255',
        ]);
		
		$user = auth()->user();
		
		//...
		$details = new UserStreamer;
		if(@$user->userStreamer->id){
			$details->id = $user->userStreamer->id;
			$details->exists = true;
		}
		$details->users_id = $user->id;
		$details->twitter = $request->twitter;
		if(@$request->links){
			$details->links = json_encode($request->links);
		}
		$details->visibility = $request->visibility;
		$details->youtube_channel = $request->youtube_channel;
		$details->twitch_channel = $request->twitch_channel;
		if(@$request->link_videos){
			$details->link_videos = json_encode($request->link_videos);
		}
		$details->save();
		
		
		//...
		if($request->tags){
            foreach($request->tags as $tag){
                if(@$tag){
                    $checkTags = UserTags::where('users_id', $user->id)->where('tags_id', $tag)->first();

                    $storeTag = new UserTags;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->users_id = $user->id;
                    $storeTag->tags_id = $tag;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteTags = UserTags::where('users_id', $user->id)->whereNotIn('tags_id', $request->tags)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		$this->flash('success', 'Profile updated successfully');
        return redirect()->back();
    }
}
