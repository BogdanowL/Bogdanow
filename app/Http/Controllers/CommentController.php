<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Notifications\NewComment;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function show($id)
    {
        //Получение комментариев из БД
        $company = Company::find($id);
        $managerComments = $company->getManagerComments($company);
        $generalComments = $company->getGeneralComments($company);
        $aboutComments = $company->getAboutComments($company);
        $phoneComments = $company->getPhoneComments($company);
        $tinComments = $company->getTinComments($company);
        $addressComments = $company->getAddressComments($company);
        $nameComments = $company->getNameComments($company);
        return view('company', compact( 'company',
            'managerComments', 'generalComments', 'nameComments',
            'phoneComments', 'tinComments', 'addressComments', 'aboutComments'));
    }

    public function store(Request $request, $id)
    {
        //валидация
        if ($request->has('name'))
        {$this->validate($request,['name' => 'required']);}
        elseif ($request->has('manager'))
        {$this->validate($request,['manager' => 'required']);}
        elseif ($request->has('general'))
        {$this->validate($request,['general' => 'required']);}
        elseif ($request->has('phone'))
        {$this->validate($request,['phone' => 'required']);}
        elseif ($request->has('tin'))
        {$this->validate($request,['tin' => 'required']);}
        elseif ($request->has('address'))
        {$this->validate($request,['address' => 'required']);}
        elseif ($request->has('about'))
        {$this->validate($request,['about' => 'required']);}

        //новый комментарий
        $comment = Comment::add($request, $id);
        //Уведомления
        $user = Auth::user();
        $comment->user->notify(new NewComment($user, $comment));

        return redirect()->back();
    }

    public function destroy($id)
    {
        //удаление
        Comment::find($id)->delete();
        return redirect()->back();
    }
}
