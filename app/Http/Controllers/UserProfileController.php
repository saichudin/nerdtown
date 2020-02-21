<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vanilo\Product\Models\ProductProxy;
use Auth;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::find($id)->first();
        $products = ProductProxy::where('user_id',$id)->where('state','active')->get();

        $foll = User::find(Auth::id());
        $following = $user->isFollowedBy($foll);
        //dd($following);

        return view('user.profile', compact('user','products','following'));
    }

    public function follow($id)
    {
        $user = User::find(Auth::id());
        $user->follow($id);
        $user->save();

        return redirect('/user/profile/'.$user->id);
    }

    public function unfollow($id)
    {
        $user = User::find(Auth::id());
        $user->unfollow($id);
        $user->save();

        return redirect('/user/profile/'.$user->id);
    }
}
