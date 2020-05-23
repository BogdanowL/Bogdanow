<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::all();
        return view('home', compact('companies'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
           'tin' => 'required',
           'general' => 'required',
           'manager' => 'required',
           'address' => 'required',
           'phone' => 'required',
        ]);
        //Создание компании
        Company::add($request);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        Company::find($id)->delete();
        return redirect()->back();
    }
}
