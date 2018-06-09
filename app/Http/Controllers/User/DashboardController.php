<?php

namespace App\Http\Controllers\User;

use App\trx;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

      if (Auth::user()->profile == 0){

          return redirect()->route('user.profile.index');

      }else {
            $users = User::all();
            $trx = trx::latest()->get();

            return view('user.dashboard', compact('users', 'trx'));

       }
    }


    public function send()

    {
        if (Auth::user()->profile == 0){

            return redirect()->route('user.profile.index');

        }else {

            return view('user.send_money');
        }
    }


    public function emailv()

    {


        return view('user.verify.emailverify');


    }


    public function mobilev(Request $request)

    {

        return 'mobilev';
    }

    public function docv(Request $request)

    {

        return 'docv';
    }
}
