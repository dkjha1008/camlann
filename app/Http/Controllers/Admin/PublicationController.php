<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use App\Models\Publication;
use App\Models\PublicationReporter;

class PublicationController extends Controller
{
    use LivewireAlert;

    //
    public function index()
    {
		$title = array(
			'title' => 'Publication',
			'active' => 'publication',
		);
		
		$publications = Publication::get();

        return view('admin.publication.index', compact('title', 'publications'));
    }
	
	//
    public function create()
    {
		$title = array(
			'title' => 'Publication',
			'active' => 'publication',
		);
		
		$user = auth()->user();
		
		$reporters = User::where('role', 'reporter')->whereStatus('1')->get()->pluck('name', 'id');
		
        return view('admin.publication.create', compact('title', 'user', 'reporters'));
    }
	
	//
    public function store(Request $request)
    {
		$request->validate([
            'publication' => 'required|max:255',
            'image' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
		
		
		//...
		$store = new Publication;
		$store->publication = $request->publication;
		
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
            $file_name = md5(uniqid() . time()) . '.png';
			
            $imageFullPath = $folderPath . $file_name;
            file_put_contents($imageFullPath, $image_base64);

            //...
            $store->image = $file_name;
        }
		
		$store->description = $request->description;
		$store->status = $request->status;
		$store->save();
		
		
		//...
		if($request->reporters){
            foreach($request->reporters as $reporter){
                if(@$reporter){
                    $checkReporter = PublicationReporter::where('users_id', $reporter)->where('publication_id', $store->id)->first();

                    $storeReporter = new PublicationReporter;
                    if(@$checkReporter){
                        $storeReporter->id = $checkReporter->id;
                        $storeReporter->exists = true;
                    }
                    $storeReporter->users_id = $reporter;
                    $storeReporter->publication_id = $store->id;
                    $storeReporter->save();
                }
            }

            //...delete
            $deleteTags = PublicationReporter::where('publication_id', $store->id)->whereNotIn('users_id', $request->reporters)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		$this->flash('success', 'Publication created successfully');
        return redirect()->route('admin.publication');
    }
	
	
	//
    public function edit(Publication $publication)
    {
		$title = array(
			'title' => 'Publication',
			'active' => 'publication',
		);
		
		$user = auth()->user();
		
		$reporters = User::where('role', 'reporter')->whereStatus('1')->get()->pluck('name', 'id');
		
        return view('admin.publication.edit', compact('title', 'user', 'reporters', 'publication'));
    }
	
	
	
	//
    public function update(Request $request, Publication $publication)
    {
		$request->validate([
            'publication' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);
		
		
		//...
		$publication->publication = $request->publication;
		
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
            $file_name = md5(uniqid() . time()) . '.png';
			
            $imageFullPath = $folderPath . $file_name;
            file_put_contents($imageFullPath, $image_base64);

            //...
            $publication->image = $file_name;
        }
		
		$publication->description = $request->description;
		$publication->status = $request->status;
		$publication->save();
		
		
		//...
		if($request->reporters){
            foreach($request->reporters as $reporter){
                if(@$reporter){
                    $checkReporter = PublicationReporter::where('users_id', $reporter)->where('publication_id', $publication->id)->first();

                    $storeReporter = new PublicationReporter;
                    if(@$checkReporter){
                        $storeReporter->id = $checkReporter->id;
                        $storeReporter->exists = true;
                    }
                    $storeReporter->users_id = $reporter;
                    $storeReporter->publication_id = $publication->id;
                    $storeReporter->save();
                }
            }

            //...delete
            $deleteTags = PublicationReporter::where('publication_id', $publication->id)->whereNotIn('users_id', $request->reporters)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
        $this->flash('success', 'Publication updated successfully');
        return redirect()->route('admin.publication');
    }
	
}
