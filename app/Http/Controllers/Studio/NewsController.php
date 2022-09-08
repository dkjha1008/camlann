<?php

namespace App\Http\Controllers\Studio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Intervention\Image\ImageManagerStatic as Image;
use Str;

use App\Models\{
    Game,
    News,
	NewsGames
};


class NewsController extends Controller
{
	use LivewireAlert;

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
		$games = Game::whereStatus('1')->pluck('title', 'id');
		
        return view('studio.news.create', compact('user', 'title', 'games'));
    }
	
	
	public function store(Request $request)
    {
		$request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:1024',
            'publish_date' => 'required',
            'games' => 'required',
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
		
		
		//games
		if($request->games){
            foreach($request->games as $game){
                if(@$game){
                    $checkTags = NewsGames::where('news_id', $store->id)->where('games_id', $game)->first();

                    $storeTag = new NewsGames;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->news_id = $store->id;
                    $storeTag->games_id = $game;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteGames = NewsGames::where('news_id', $store->id)->whereNotIn('games_id', $request->games)->get();
                        
            if(count($deleteGames)>0){
                foreach($deleteGames as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		
		
		$this->flash('success', 'News created successfully');
        return redirect()->route('studio.news');
    }
	
	public function edit(News $news)
    {
		$title = array(
			'title' => 'Edit News',
			'active' => 'news',
		);
		
		$user = auth()->user();
		$games = Game::whereStatus('1')->pluck('title', 'id');
		
        return view('studio.news.edit', compact('user', 'title', 'games', 'news'));
    }

     public function view($news){


    	$new = News::where('id', '=' , $news)->first();
    	return view('studio.news.view', compact('new'));
    }
	
	public function update(Request $request, News $news)
    {
		$request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'mimetypes:image/jpeg,image/png,image/jpg|max:1024',
            'publish_date' => 'required',
            'games' => 'required',
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
		
		
		//games
		if($request->games){
            foreach($request->games as $game){
                if(@$game){
                    $checkTags = NewsGames::where('news_id', $news->id)->where('games_id', $game)->first();

                    $storeTag = new NewsGames;
                    if(@$checkTags){
                        $storeTag->id = $checkTags->id;
                        $storeTag->exists = true;
                    }
                    $storeTag->news_id = $news->id;
                    $storeTag->games_id = $game;
                    $storeTag->save();
                }
            }

            //...delete
            $deleteGames = NewsGames::where('news_id', $news->id)->whereNotIn('games_id', $request->games)->get();
                        
            if(count($deleteGames)>0){
                foreach($deleteGames as $ids){
                    $ids->delete();
                }
            }
        }
		
		
		
		$this->flash('success', 'News updated successfully');
        return redirect()->route('studio.news');
    }
}
