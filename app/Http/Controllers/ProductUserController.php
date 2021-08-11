<?php

namespace App\Http\Controllers;

use App\Models\ProductUser;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class ProductUserController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        $sum = 0;

        foreach ($user->product as $u){
            if($u->pivot->status)
            {
                $sum += $u->price * $u->pivot->qty;
            }
        }

        return view('Chart.chart',[
            'user' => $user,
            'total' => $sum,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty' => ['required','integer','gt:0']
        ]);

        ProductUser::create ([
            'product_id' => $request->product_id,
            'user_id'=> $request->user_id,
            'qty' => $request->qty,
            'status' => '1'
        ]);

        return redirect("Chart/$request->email");
    }

    public function updateStat(Request $request,$product_id,$user_id,$email)
    {
        $charts = ProductUser::where('product_id',$product_id)
            ->where('user_id', $user_id)->get();
//        ddd($chart);
        foreach ($charts as $chart)
        {
            $chart -> update([
                'status' => 0,
            ]);
        }

        return redirect(url("Chart/$email"));
    }

}
