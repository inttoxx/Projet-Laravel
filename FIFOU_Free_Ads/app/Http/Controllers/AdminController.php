<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\Locations;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
    public function aAds()
    {
        $Ads = Ads::all();
        return view('admin.aAds', ['Ads' => $Ads]);
    }
    public function aCategory()
    {
        $categories = Categories::all();
        return view('admin.aCategory', ['categories' => $categories]);
    }
    public function aLocations()
    {
        $locations = Locations::all();
        return view('admin.aLocations', ['locations' => $locations]);
    }
    public function aUsers()
    {
        $users = User::all();
        return view('admin.aUsers', ['users' => $users]);
    }
    public function newCat()
    {
        return view('admin.newCat');
    }
    public function createNewCat(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $cat = Categories::create([
            'category' => $request->name,
        ]);
        return redirect()->route('aCategory')->withSuccess('Location ' . $cat->id . ' as been create !');
    }
    public function newLocation()
    {
        return view('admin.newLocation');
    }
    public function createNewLoc(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $loc = Locations::create([
            'location' => $request->name,
        ]);
        return redirect()->route('aLocations')->withSuccess('Location ' . $loc->id . ' as been create !');
    }
    public function newUser()
    {
        return view('admin.newUser');
    }
    public function createNewUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'nickname' => 'required',
            'admin' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone_number' => $request['phone_number'],
            'nickname' => $request['nickname'],
            'admin' => $request['admin'],
            'password' => Hash::make($request['password'])
        ]);
        return redirect()->route('adminUser')->withSuccess('User ' . $user->id . ' as been create !');
    }

    public function updCat($id)
    {
        $Cat = Categories::where('id', $id)->get();
        return view('admin.updCat', ['category' => $Cat]);
    }
    public function updLocation($id)
    {
        $loc = Locations::where('id', $id)->get();
        return view('admin.updLocation', ['location' => $loc]);
    }
    public function updUser($id)
    {
        $user = User::where('id', $id)->get();
        return view('admin.updUser', ['user' => $user]);
    }
    public function updateCat(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $Cat = Categories::find($request->id);
        $Cat->category = $request->name;
        $Cat->save();
        return redirect()->route('aCategory')->withSuccess('Category ' . $Cat->id . ' as been updated !');
    }
    public function updateLoc(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $loc = Locations::find($request->id);
        $loc->location = $request->name;
        $loc->save();
        return redirect()->route('aLocations')->withSuccess('Location ' . $loc->id . ' as been updated !');
    }
    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'phone_number' => $request->phone_number,
            'admin' => $request->admin
        ]);

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'phone_number' => $request->phone_number,
            'admin' => $request->admin
        ]);

        return redirect()->route('adminUser')->withSuccess('User ' . $user->id . ' as been updated !');
    }
    public function delUser($id)
    {
        $ad = Ads::where('user_id', $id)->get();
        Storage::delete($ad->id . '.' . $ad->picture_extension);
        $ad->delete();
        $user = User::find($id);
        $user->delete();
        return redirect()->route('adminUser');
    }
}
