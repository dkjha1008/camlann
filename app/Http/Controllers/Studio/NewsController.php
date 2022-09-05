<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\Tag;
use App\Models\News;
use App\Models\NewsTags;
use Str;

class NewsController extends Controller
{
    //
    public function index()
    {
		$title = array(
			'title' => 'Latest News',
			'active' => 'news',
		);
		
		$user = auth()->user();
		
		$news = $user->news;
		
        return view('studio.news.index', compact('user', 'title', 'news'));
    }
	
	
    public function create()
    {
		$title = array(
			'title' => 'Create News',
			'active' => 'news',
		);
		
		$user = auth()->user();
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('studio.news.create', compact('user', 'title', 'tags'));
    }
	
	
	public function store(Request $request)
    {
		$request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:1024',
            'publish_date' => 'required',
            'tags' => 'required',
            'status' => 'required'
        ]);
		
		$user = auth()->user();
		
		$store = new News;
		$store->users_id = $user->id;
		$store->title = $request->title;
		$store->slug = Str::slug($request->title);
		$store->description = $request->description;
		
        if ($request->file('image')) {
			$path = 'storage/news/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$image = $user->id . time() .'.png';
			Image::make($request->file('image'))->save($path.$image);
			$store->image = $image;
		}
		
		$store->publish_date = $request->publish_date;
		$store->status = $request->status;
		$store->save();
		
		
		//tags
		if($request->tags){
            foreach($request->tags as $tag){
                if(@$tag){
                    $checkTags = NewsTags::where('news_id', $store->id)->where('tags_id', $tag)->first();

                    $storeTag = new NewsTags;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->news_id = $store->id;
                    $storeTag->tags_id = $tag;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteTags = NewsTags::where('news_id', $store->id)->whereNotIn('tags_id', $request->tags)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		
		
		
		//Session::flash('success', 'Profile updated successfully');
        return redirect()->route('studio.news');
    }
	
	public function edit(News $news)
    {
		$title = array(
			'title' => 'Edit News',
			'active' => 'news',
		);
		
		$user = auth()->user();
		$tags = Tag::whereStatus('1')->pluck('name', 'id');
		
        return view('studio.news.edit', compact('user', 'title', 'tags', 'news'));
    }
	
	public function update(Request $request, News $news)
    {
		$request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:1024',
            'publish_date' => 'required',
            'tags' => 'required',
            'status' => 'required'
        ]);
		
		$user = auth()->user();
		
		$news->title = $request->title;
		$news->slug = Str::slug($request->title);
		$news->description = $request->description;
		
        if ($request->file('image')) {
			$path = 'storage/news/';
			if(!is_dir($path)) {
				mkdir($path, 0775, true);
				chown($path, exec('whoami'));
			}
			
			$image = $user->id . time() .'.png';
			Image::make($request->file('image'))->save($path.$image);
			$news->image = $image;
		}
		
		$news->publish_date = $request->publish_date;
		$news->status = $request->status;
		$news->save();
		
		
		//tags
		if($request->tags){
            foreach($request->tags as $tag){
                if(@$tag){
                    $checkTags = NewsTags::where('news_id', $news->id)->where('tags_id', $tag)->first();

                    $storeTag = new NewsTags;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->news_id = $news->id;
                    $storeTag->tags_id = $tag;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteTags = NewsTags::where('news_id', $news->id)->whereNotIn('tags_id', $request->tags)->get();
                        
            if(count($deleteTags)>0){
                foreach($deleteTags as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		
		
		
		//Session::flash('success', 'Profile updated successfully');
        return redirect()->route('studio.news');
    }
}
