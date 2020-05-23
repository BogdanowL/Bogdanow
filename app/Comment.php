<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    }
    //создание комментария
    public static function add(Request $request,$id)
    {
        $comment = new static;
        $comment->user_id = Auth::user()->id;
        $comment->commentable_id = $id;
        $comment->commentable_type = $comment->check($request);
        $comment->text = last($request->except('_token'));
        $comment->save();
        return $comment;
    }

    public function check(Request $request)
    {
        if($request->input('manager'))
        {
          return  'App\Manager';
        }

        elseif($request->input('general'))
        {
           return 'App\General';
        }

        elseif($request->input('phone'))
        {
          return  'App\Phone';
        }
        elseif($request->input('tin'))
        {
           return 'App\Tin';
        }

        elseif($request->input('about'))
        {
          return  'App\About';
        }

        elseif($request->input('address'))
        {
           return 'App\Address';
        }

        elseif($request->input('name'))
        {
            return 'App\Name';
        }
    }



}
