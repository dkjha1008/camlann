<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favourite;

class FavouriteController extends Controller
{
    public function addfavourite(Request $request){

        $user_id = auth()->user()->id;

        $favourite = new Favourite; 
        $favourite->user_id = $user_id; 
        $favourite->fav_users_id = $request->user_id; 
        $favourite->save(); 
      return response()->json(['success'=>'changed']);

    }

       public function removefavourite(Request $request){

        $user_id = auth()->user()->id;

       
        $favourite = Favourite::where('fav_users_id', '=', $request->user_id)
        ->where('user_id', '=', $user_id)
        ->delete();
        return response()->json(['success'=>'changed']);  

    }
}
