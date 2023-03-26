<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\Product;
use App\Models\Special_order;
use App\Notifications\AcceptRequest;
use App\Notifications\CancelRequest;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;



class OrderController extends Controller
{
    public function orders_list()
    {
        $orders = Order::where('status','1')->with('address')->latest()->get();
        $a = 0;
        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
       }
        return redirect()->back();
    }


    public function orderss_list()
    {
        $orders = Order::where('status','2')->with('address')->latest()->get();
        $a = 0;
        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }


    public function sorders_list()
    {
        $orders = Special_order::get();
      
        if($orders ){
        return view('admin.orders.slist')->with('orders', $orders) ;
                }
                return redirect()->back();
    }

    public function sh_orders_list()
    {
        $orders = Order::where('status','3')->with('address')->orderBy('id','desc')->get();
        $a = 1;

        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }
    public function shs_orders_list()
    {
        $orders = Order::where('status','0')->with('address')->orderBy('id','desc')->get();
        $a = 1;

        if($orders ){
        return view('admin.orders.list')->with('orders', $orders)->with('a', $a);
                }
                return redirect()->back();
    }
    public function order_profile($id)
    {
         
        $order = Order::find($id);
        $address = OrderAddress::where('order_id', $order->id )->first();
        if($order ){
            return view('admin.orders.profile', [
                'order' => $order,  
                'address' => $address, 
             ]);   
         }
        return redirect()->back();
    }

    public function sorder_profile($id)
    {
         
        $order = Special_order::find($id);
        $address = OrderAddress::where('Special_order_id', $order->id )->first();
        if($order ){
            return view('admin.orders.sprofile', [
                'order' => $order,  
                'address' => $address, 
             ]);   
         }
        return redirect()->back();
    }
    public function shipping($id)
    {
         
        $order = Order::find($id);
        $address = OrderAddress::where('order_id', $order->id )->first();

        if($order ){
             foreach($order->items as $item ){
                if($item->product->quantity == 0){
                    $msg = " نفذت كمية المنتج " .  $item->product->name;
                    notify()->success($msg );
                    return redirect()->back( ); 
                }else{
                    $prod = Product::find($item->product->id);
                    $prod->quantity = $prod->quantity  - $item->quantity ;
                    $prod->save();
                }
             }
            $order->status = 2 ;
            $order->save();
            $email = $address->email;
            if($email){
                Notification::route('mail' ,$email)->notify(new AcceptRequest($order));
            } 
            notify()->success(' تم اضافة المنتج بقائمة الطلبات المشحونة  واراسل ايميل !');
          return redirect()->route('admin.orders');
         }
        return redirect()->back();
    }

    public function shipping_s($id)
    {
         
        $order = Special_order::find($id);
 
        if($order ){ 
            $order->status = 2 ;
            $order->save();
           
            notify()->success(' تم شحن المنتج!');
          return redirect()->route('admin.sorders');
         }
        return redirect()->back();
    }
     public function cancel($id)
    {
         
        $order = Order::find($id);
 
        if($order ){
            
            $order->status = 0;
            $order->save(); 
            
             $address = OrderAddress::where('order_id', $order->id )->first();
             $email = $address->email;
            if($email){
                Notification::route('mail' ,$email)->notify(new CancelRequest($order));
            }
            notify()->success(' تم الغاء الطلب وارسال ايميل للعميل يفيد بإلغاء الطلب');
          return redirect()->route('admin.orders');
         }
        return redirect()->back();
    }

    public function cancel_s($id)
    {
         
        $order = Special_order::find($id);
 
        if($order ){
            
            $order->status = 0;
            $order->save();  
            notify()->success(' تم الغاء الطلب   ');
          return redirect()->route('admin.sorders');
         }
        return redirect()->back();
    }
    public function order_delete(Request $request){

        $data = Order::find($request->id);  
        if( $data){

            $data->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }









    public function reportmony()
    {
        $orders = Order::with('items.product')
        ->where('status', 'completed')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.orders.report', compact('orders')); 
        
        //  return $orders;
    }








}




