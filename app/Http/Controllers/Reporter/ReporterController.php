<?php

namespace App\Http\Controllers\Reporter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Tag;
use App\Models\UserReporter;
use App\Models\UserTags;

class ReporterController extends Controller
{
	use LivewireAlert;
	
    //
    public function index()
    {
		$title = array(
			'title' => 'Reporter',
			'active' => 'reporter',
		);
		
		$user = auth()->user();
		
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('reporter.profile.index', compact('user', 'title', 'tags'));
    }
	
	//
    public function store(Request $request)
    {
		$request->validate([
            'twitter' => 'required|max:255',
            'bio' => 'required',
        ]);
		
		$user = auth()->user();
		
		$user->bio = $request->bio;
		$user->save();


		//...
		$details = new UserReporter;
		if(@$user->userReporter->id){
			$details->id = $user->userReporter->id;
			$details->exists = true;
		}
		$details->users_id = $user->id;
		$details->twitter = $request->twitter;
		if(@$request->links){
			$details->links = json_encode($request->links);
		}
		$details->visibility = $request->visibility;
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
