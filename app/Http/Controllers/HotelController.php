<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Hotel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facade\Redirect;

class HotelController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addHotel(Request $request)
    {
        if(Auth::user()->id != 1)
        {
            return view('errors.503');
        }
        if($request->isMethod("post"))
        {
            $rules = array(
                "name"=>"Required|min:5|max:20|Alpha",
                "image_path" => "Required"
                );
            $valid = Validator::make($request->all(),$rules);
            if($valid->fails())
            {
                return $valid->errors()->all();
            }
            $hotel = new Hotel();
            $hotel->name = $request->name;
            $hotel->image_path = $request->image_path;
            $hotel->save();
            return redirect("/");
        }
        else
        {
            return view("vendor.addhotel");
        }
    }
    
}
