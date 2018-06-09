<?php /** @noinspection ALL */

namespace App\Http\Controllers\User;

use App\charges;
use App\sendMinMax;
use App\trx;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Help\helpers;


class TrxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $money = Auth::user()->money;
       if ($money >0) {
           return round($money, 2);
       }else{
           return 0;
       }

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
            'sendto'=> 'required|email',
          'amount'=> 'required|integer',

       ]);

        $minmax = sendMinMax::all();
        foreach ($minmax as $minx)
        $usee = User::where('email',$request->sendto)->get();
        foreach ($usee as $user)





                $tex = new trx;


                $amup = User::find(Auth::user()->id);

                //Send Form  Money Update User Start
                $costt = charges::all();
                foreach ($costt as $cost)
                    $parsen = $cost->cost / 100;
                $totalcost = $request->amount * $parsen;
                $total = $totalcost + $request->amount;


                if ($amup->money < $total) {
                    Toastr::warning('Your Balance is Low', 'Balance');
                    return redirect()->back();

                } elseif ($request->amount < $minx->min) {

                    Toastr::warning('You Payment Send Mimimum $' . $minx->min, 'Payment');
                    return redirect()->back();

                } elseif ($request->amount > $minx->max) {

                    Toastr::warning('You Payment Send Maximum $' . $minx->max, 'Payment');
                    return redirect()->back();

                } else {

                    $moneyup = $amup->money - $total;

                    $amup->money = $moneyup;

                    // End Money Update User End
                    $tex->user_id = Auth::user()->id;


                    $tex->amount = $request->amount;
                    $tex->charge = round($totalcost, 2);
                    $tex->via = 1;
                    $tex->refund = 1;
                    $tex->re_id = $user->id;
                    $tex->send_id = Auth::user()->id;
                    $ren = $tex->trx_id = RandomString();
                    $tex->date = time();
                    $tex->mass = $request->mass;
                    $user->money = $user->money + $request->amount;


                }

                if ($amup->save() && $user->save() && $tex->save()) {

                    Toastr::success('Your Payment Send $' . $request->amount, 'Payment');
                    return redirect()->route('user.dashboard');
                }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\trx  $trx
     * @return \Illuminate\Http\Response
     */
    public function show(trx $trx)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\trx  $trx
     * @return \Illuminate\Http\Response
     */
    public function edit(trx $trx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\trx  $trx
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\trx  $trx
     * @return \Illuminate\Http\Response
     */
    public function destroy(trx $trx)
    {
        //
    }
}
