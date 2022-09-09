<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\user;
use App\Models\Contact;

class DashboardController extends Controller
{
    //
    public function index()
    {
		$title = array(
			'title' => 'Dashboard',
			'active' => 'dashboard'
		);

		$user = auth()->user();

		$favGames = $user->favouriteGames()->limit('10')->orderBy('id', 'desc')->get();

		$favUser = $user->favourite()->limit('10')->orderBy('id', 'desc')->get();

		$news = News::whereStatus('1')->where('publish_date', '>=', date('Y-m-d'))->limit('10')->orderBy('id', 'desc')->get();

		//...messages
		$sender = Contact::where('user_id', $user->id)->select('reciever_id')->groupBY('reciever_id')->limit('10')->orderBy('id', 'desc')->get()->toArray();

		$rec = Contact::where('reciever_id', $user->id)->select('user_id')->groupBY('user_id')->get()->toArray();

		$usersArray = array_merge($sender, $rec);

		$messages = User::whereIn('id', $usersArray)->get();

		
        return view('pages.dashboard.index', compact('title', 'user', 'favGames', 'favUser', 'news', 'messages'));
    }

}
