<?php

namespace App\Http\Controllers;
use App\Company;
use App\Follow;
use Auth;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
  public function home($id_company)
  {
    $followCount  = Follow::where('id_user',Auth::user()->id)->where('id_target', $id_company)->count();
    $data = Company::where('id_random',$id_company)->get();
    $data1 = $data->id;
    dd($data1);

    return view('company.profile', [
        'data' => $data,
        'followCount'  => $followCount
    ]);
  }
}
