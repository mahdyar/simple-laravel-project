<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;

class LikeController extends Controller
{
    // Made with <3 by mahdyar.me
    
    public function get()
    {
        $likes = Like::all();

        $count = $likes->count();
        return view('welcome',['count'=>$count]);
    }

    public function store(Request $request)
    {
        $key =  md5($request->ip() . $request->header('User-Agent'));
        $likes = Like::find($key);
        if ($likes) {
            return response()->json(['status'=>'0']);
         } else{
             $like = new Like;
             $like->key = $key;
             $like->save();

             $likes = Like::all();
             $count = $likes->count();
             return response()->json(['status'=>'1','count'=>$count]);
         }
    }
}
