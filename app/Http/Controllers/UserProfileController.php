<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Vanilo\Product\Models\ProductProxy;
use Auth;

class UserProfileController extends Controller
{
    public function myprofile()
    {
        $user = User::find(Auth::id());
        $followers = $user->followers;
        //dd($followers);
        return view('user.myprofile', compact('user','followers'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $products = ProductProxy::where('user_id',$id)->where('state','active')->get();
        $foll = User::find(Auth::id());
        $following = $user->isFollowedBy($foll);

        return view('user.profile', compact('user','products','following'));
    }

    public function follow($id)
    {
        $user = User::find(Auth::id());
        $user->follow($id);
        $user->save();

        return redirect('/user/profile/'.$id);
    }

    public function unfollow($id)
    {
        $user = User::find(Auth::id());
        $user->unfollow($id);
        $user->save();

        return redirect('/user/profile/'.$id);
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->save();

        return redirect('/user/my-profile/');
    }

    public function avatar(Request $request)
    {
        $user = User::find(Auth::id());
        if ($user->hasMedia('avatar')) {
            $user->clearMediaCollection('avatar');
        }
        $user->addMedia($request->file('avatar'))->toMediaCollection('avatar');

        $user->save();

        return redirect('/user/my-profile/');
    }
}
