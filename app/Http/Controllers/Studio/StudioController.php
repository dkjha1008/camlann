<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use App\Models\{
    Tag,
    UserStudio,
	UserTags
};

class StudioController extends Controller
{
    use LivewireAlert;

    //
    public function index()
    {
		$title = array(
			'title' => 'Studio',
			'active' => 'studio',
		);
		
		$user = auth()->user();
		
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		$games = [];
		
        return view('studio.profile.index', compact('user', 'title', 'tags', 'games'));
    }
	
	//
    public function store(Request $request)
    {
		$request->validate([
            'studio_name' => 'required',
            'website' => 'required|max:255',
            'description' => 'required',
        ]);
		
		$user = auth()->user();
		//...
		if ($request->image && strpos($request->image, "data:") !== false) {
            $image = $request->image;

            $folderPath = ('storage/images/');
            if (!is_dir($folderPath)) {
                mkdir($folderPath, 0775, true);
                chown($folderPath, exec('whoami'));
            }

            $image_parts = explode(";base64,", $image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_base64 = base64_decode($image_parts[1] ?? null) ?? null;
            $file_name = $user->id . '-' . md5(uniqid() . time()) . '.png';
			
            $imageFullPath = $folderPath . $file_name;
            file_put_contents($imageFullPath, $image_base64);

            //...
            $user->image = $file_name;
			$user->save();
        }
		
		
		//...
		$details = new UserStudio;
		if(@$user->userStudio->id){
			$details->id = $user->userStudio->id;
			$details->exists = true;
		}
		$details->users_id = $user->id;
		$details->website = $request->website;
        $details->description = $request->description;
		$details->studio_name = $request->studio_name;
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
