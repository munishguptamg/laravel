<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Hotel;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facade\Redirect;

class CommentController extends Controller
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

    
    public function addComments(Request $request)
    {
        $rules = array(
            "hotel_id" => "Required|numeric|min:1",
            "comment"  => "Required|max:1000|min:3"
            );
        $validation = Validator::make($request->getContents(),$rules);
        if($validation->fails())
        {
            return $validation->errors()->all();
        }
        $comment = new Commments();
        $comment->user_id = Auth::user()->id;
        $comment->hotel_id = $request->input('hotel_id');
        $comment->comments = $request->input('comment');
        $comment->save();
        return redirect('/');
    }
}
