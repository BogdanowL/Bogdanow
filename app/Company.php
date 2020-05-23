<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Company extends Model
{

    protected $guarded = [];

    //связи с моделями
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function general()
    {
        return $this->hasOne(General::class);
    }

    public function manager()
    {
        return $this->hasOne(Manager::class);
    }

    public function phone()
    {
        return $this->hasOne(Phone::class);
    }

    public function tin()
    {
        return $this->hasOne(Tin::class);
    }

    public function about()
    {
        return $this->hasOne(About::class);
    }

    public function nameComments()
    {
        return $this->hasOne(Name::class);
    }
    //создание комментария и связей с моделями
    public static function add($request)
    {
        $company = new static;
        $company->name = $request->name;
        $company->save();
        $company->phone()->create(['text' => $request->phone, 'company_id' => $company->id]);
        $company->general()->create(['text' => $request->general, 'company_id' => $company->id]);
        $company->address()->create(['text' => $request->address, 'company_id' => $company->id]);
        $company->manager()->create(['manager' => $request->manager, 'company_id' => $company->id]);
        $company->tin()->create(['text' => $request->tin, 'company_id' => $company->id]);
        $company->nameComments()->create(['company_id' => $company->id]);
        $company->about()->create(['company_id' => $company->id]);
    }
    // получение комментариев из БД
    public function getManagerComments($company)
    {
        if ($company->manager == null) {return;}
        return $company->manager->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getGeneralComments($company)
    {
        if ($company->general == null) {return;}
        return $company->general->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getAboutComments($company)
    {
        if ($company->about == null) {return;}
        return $company->about->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getTinComments($company)
    {
        if ($company->tin == null) {return;}
        return $company->tin->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getPhoneComments($company)
    {
        if ($company->phone == null) {return;}
        return $company->phone->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getAddressComments($company)
    {
        if ($company->address == null) {return;}
        return $company->address->comments()->where('user_id', Auth::user()->id)->get();
    }

    public function getNameComments($company)
    {
        if ($company->nameComments == null) {return;}
        return $company->nameComments->comments()->where('user_id', Auth::user()->id)->get();
    }


}
