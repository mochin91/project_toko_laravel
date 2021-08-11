<?php

namespace App\Http\Controllers;

use App\Models\ProductUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Details_Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = User::where('email',$request->email)
            ->first()
            ->order()
            ->where('status',true)
            ->orderBy('paid','ASC')
            ->orderBy('order_id','ASC')
            ->get();
//        ddd($user->order());
        return view('Order.index', [
            'datas' => $user,
        ]);
    }

    public function all(Request $request)
    {
        $order = Order::orderBy('paid','DESC')
            ->orderBy('created_at','ASC')
            ->where('status',true)
            ->get();
//        ddd($user->order());
        return view('Order.all', [
            'datas' => $order,
        ]);
    }

    public function store(Request $request)
    {
//        $id = Order::orderBy('','DESC')->first();
//        $orderId = 'OD'. date("ymd").str_pad($id->id +1 ,4,0,STR_PAD_LEFT);
//        ddd($orderId);
//        $filteredUserProduct = $request->userProduct->where('status',true);

//        foreach ($request->){
//
//        }
//        ddd($request->userId);

        $user = User::find($request->userId);
        $product = $user->product;
        //ddd($product);

        try{
            DB::beginTransaction();
            Order::create([
                'order_id' => 'OD'. mt_rand(0,100000),
                'user_id' => $request->userId,
                'grand_total' => $request->grandTotal,
                'upload_payment_path' =>'',
                'paid' => false,
                'status' => true,
            ]);

            $id = Order::OrderBy('id','DESC')->first();

            //ddd($request->userProduct);
            foreach ($product as $detailOrder)
            {
                if($detailOrder->pivot->status)
                {
                    Details_Order::create([
                        'order_id' => $id->id,
                        'product_id' => $detailOrder->pivot->product_id,
                        'qty' => $detailOrder->pivot->qty,
                        'price' => $detailOrder->price,
                        'total' =>$detailOrder->price * $detailOrder->pivot->qty,
                        'status' => true,
                    ]);

                }
            }
            DB::table('Product_users')->where('user_id',$request->userId)->update(['status'=>false]);

            DB::commit();


        } catch(Throwable $e) {
            DB::rollBack();
        }
        return redirect(url("Detail/Order/{$id->id}"));
    }

    public function showDetails($id)
    {
        $order = Order::find($id);
        $detailOrder = $order->product;
//        foreach ($detailOrder as $o)
//        {
//            ddd($o->pivot);
//        }
//        ddd($order->product[0]->pivot);
        return view('Order/detail',[
            'datas' => $detailOrder,
            'order' => $order,
        ]);
    }

    public function uploadPembayaran(Request $request)
    {
        $request->validate([
            'image'=>['required','file'],
        ]);
//        ddd($request->file('image'));
        $picture_path = $request->file('image')->store('public/img/pembayaran');
        DB::table('orders')->where('id',$request->orderId)->update(['upload_payment_path'=>$picture_path]);
        DB::table('orders')->where('id',$request->orderId)->update(['paid'=>true]);

        return redirect(url("/Detail/Order/$request->orderId"));
    }
}
