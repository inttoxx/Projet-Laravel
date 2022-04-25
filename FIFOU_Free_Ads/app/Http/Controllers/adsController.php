<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\User;
use App\Models\Locations;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{

    public function index()
    {
        $loc = Locations::all();
        $cat = Categories::all();

        $allAds = Ads::all();
        $Ads = Ads::all()->skip(0)->take(6);

        return view('index', ['allAds' => $allAds, 'ads' => $Ads, 'locations' => $loc, 'categories' => $cat]);
    }
    public function pages($p)
    {
        $loc = Locations::all();
        $cat = Categories::all();
        $allAds = Ads::all();

        if ($p != 1)
            $Ads = Ads::all()->skip(($p - 1) * 6)->take(6);
        else
            $Ads = Ads::all()->skip(0)->take(6);



        return view('index', ['allAds' => $allAds, 'ads' => $Ads, 'locations' => $loc, 'categories' => $cat]);
    }
    public function EspacePersoUsers()
    {
        $adsUser = Ads::all()->where('user_id', Auth::id());
        return view('EspacePersoUsers', ['ads' => $adsUser]);
    }
    public function NewAd()
    {
        $locations = Locations::all();
        $categories = Categories::all();
        return view('NewAd', ['locations' => $locations, 'categories', 'categories' => $categories]);
    }
    public function updAd($id)
    {
        $ad = Ads::where('id', $id)->get();
        $locations = Locations::all();
        $categories = Categories::all();
        return view('updAd', ['locations' => $locations, 'categories', 'categories' => $categories, 'ad' => $ad]);
    }
    public function show($id)
    {
        $ad = Ads::findOrFail($id);
        return view('show', ['ad' => $ad]);
    }
    public function createNewAd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'location_id' => 'required',
            'user_id' => 'required',
            'usure' => 'required',
            'image' => 'required'
        ]);

        $newAd = Ads::create([
            'title' => $request->title,
            'description' => $request->description,
            'picture_extension' => $request->image->extension(),
            'price' => $request->price,
            'category_id' => $request->cat_id,
            'location_id' => $request->location_id,
            'user_id' => $request->user_id,
            'usure' => $request->usure
        ]);

        $imageName = $newAd->id . '.' . $newAd->picture_extension;
        $request->image->move(public_path('images'), $imageName);
        return redirect()->route('EspacePersoUsers')->withSuccess('New Ad Posted !');
    }
    public function delAd($id)
    {
        $ad = Ads::find($id);
        Storage::delete($id . '.' . $ad->picture_extension);
        $ad->delete();
        return redirect()->route('EspacePersoUsers')->withSuccess('Your Ad as been deleted !');
    }
    public function updateAd(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'cat_id' => 'required',
            'location_id' => 'required',
            'user_id' => 'required',
            'usure' => 'required',
            'image' => 'required'
        ]);

        $ad = Ads::find($request->id);
        Storage::delete($request->id . '.' . $ad->picture_extension);
        $ad->update([
            'title' => $request->title,
            'description' => $request->description,
            'picture_extension' => $request->image->extension(),
            'price' => $request->price,
            'category_id' => $request->cat_id,
            'location_id' => $request->location_id,
            'user_id' => $request->user_id,
            'usure' => $request->usure
        ]);

        $imageName = $ad->id . '.' . $ad->picture_extension;
        $request->image->move(public_path('images'), $imageName);
        return redirect()->route('EspacePersoUsers')->withSuccess('Your Ad as been updated !');
    }
    public function filter(Request $request)
    {
        $filter = Ads::where('title', 'like', '%' . $request->title . '%')
            ->where('location_id', 'like', '%' . $request->location . '%')
            ->where('category_id', 'like', '%' . $request->category . '%')
            ->where('usure', 'like', '%' . $request->usure . '%')
            ->whereBetween('price', [$request->price_min = 0, $request->price_max = 9999999999])
            ->orderBy('title', $request->title_order)
            ->orderBy('price', $request->price_order)
            ->get();

        return view('filter', ['ads' => $filter]);
    }
}
