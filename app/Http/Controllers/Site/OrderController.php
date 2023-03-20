<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\City;
use App\Models\Order;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Discount;
use App\Models\OrderAddress;
use App\Notifications\OrderRequest;
use Illuminate\Support\Facades\Notification;
use App\Models\OrderItem;
use App\Models\Address; 
use App\Models\Special_order; 
use App\Models\Setting; 
use AymanElmalah\MyFatoorah\Facades\MyFatoorah;

use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OrderController extends Controller
{
    public $address;
    protected $cart;
    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }
     
  
    public function index(Request $request)
    {    
        if($this->cart->total() == 0){
            notify()->error(__('The cart is empty'));

            return redirect()->route('viewHomePage');
        }
        $offer = Setting::where('key', 'main_title')->first()->value;;
        $rate = $request->rate;

        $cities = City::get();
         if($request->address_id){
           $this->address = Address::find($request->address_id);
            $add =1;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'address' =>  $this->address,
                'add' =>  $add,
                'offer' =>  $offer,
                'rate' =>  $rate,
                'cities' =>  $cities,
            ]);
        }else{
            $add =2;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'add' =>  $add,
                'rate' =>  $rate,
                'offer' =>  $offer,
                'cities' =>  $cities,

            ]);
        }
       
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => ['required'],
            'name' => ['required'],
            'area' => ['required'],
            'phone' => ['required' , 'numeric'],
            'street' => ['required'],
           'payment_method' => ['required'],

        ] );
            
            if($this->cart->total() == 0){
                notify()->error( __('The cart is empty'));
    
                return redirect()->route('viewHomePage');
            }
             //register 
            if(isset($request->make_user)){ 
                $this->validate($request, [
                'email' => ['required', 'string', 'email','email:rfc' , 'max:255', 'unique:users'],
                'password' => ['required','confirmed', Rules\Password::defaults()],
                //'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 
            ] );
             
            $user = User::create([
                
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => '1',
                'type' => '1'
            ]); 
        }
            try{

                
        $data1 = new Order();
        if ($data1) {
            // try {
                if(auth()->user()){
                    $userid = \auth()->user()->id;
                    $data1->user_id = $userid;
                }
                 if(isset($user)){
                    $data1->user_id = $user->id;
                }
                
                $data1->nots = $request->nots;
                $data1->discount = $request->discount;
                $data1->payment_method = $request->payment_method;
                $data1->shipping = $request->shipping;
                $data1->total = $request->total;
                $data1->save();

                $address = new OrderAddress();
            
                $address->order_id = $data1->id;
                $address->name = $request->name;
                $address->email = $request->email;
                $address->area = $request->area;
                $address->street = $request->street;
                $address->Blvd = $request->Blvd;
                $address->house = $request->house;
                $address->phone = $request->phone;
                    $address->save();
                // return $this->cart->get();
                foreach($this->cart->get() as $a){
                    
                    $item = new OrderItem();
                            
                    $item->order_id = $data1->id;
                    $item->product_id = $a->product->id;
                    $item->product_name =$a->product->name;
                    $item->price = $a->product->price;
                    $item->quantity = $a->quantity; 
                    $item->options = $a->options; 
                    $item->notes = $a->notes; 
                        $item->save();
                }
              
                $this->cart->empty();
                $email = $address->email;
                // if($email){
                //     Notification::route('mail' ,$email)->notify(new OrderRequest($data1));
                // }
                
                if($request->payment_method == "check"){
                    $order= $data1;
                    notify()->success( __('The request has been sent, please check the email for details'));

                    return redirect()->route('orders.payments.create', $order->id);
                }
                   
                 if(isset($user)){ 
                    event(new Registered($user));
                    Auth::login($user);
                    notify()->success( __('The request has been sent, and you are logged in, please check the email for details'));
                    return redirect(RouteServiceProvider::HOME);
                }else{
            notify()->success( __('The request has been sent, please check the email for details'));
            return redirect()->route('thanks');
                }
        } else {
            return redirect()->back()->with('error', 'خطأ بالبيانات');
        }
            } catch (\Exception $e){

                return   $e->getMessage() ;
            }
            
    }

     
    public function storespecialorder(Request $request)
    {
        // dd([
        //     'data'=>$request->all(),
        //     'user'=>auth()->user()->city]);
        // return  $request;
        $request->validate([
            // 'email' =>  'required' ,
            // 'name' =>  'required' ,
            // 'area' =>  'required' ,
            // 'phone' =>  'required' , 'numeric' , 
            // 'street' =>  'required' , 
            'main_image' => 'mimes:jpeg,png,jpg,gif,svg|max:3048' , 
            'design' =>  'mimes:jpeg,png,jpg,gif,svg|max:3048' , 

        ] );
        try{ 
            $user=auth()->user();
            $user_address=Address::where('user_id',$user->id)->orderBy('id','desc')->first();
            if(!$user_address){
                notify()->error( __(' يجب اضافة عنوان للحساب اولا '));
                return redirect()->back();
            }
        $data1 = new Special_order();
        if ($data1) {
            // try {
                if(auth()->user()){
                    $userid = \auth()->user()->id;
                    $data1->user_id = $userid;
                } 
                if (request()->main_image != null) {
                    $main_image = $this->uploadImage('property', $request->file('main_image'));
                    $data1->img =  $main_image;
                }
                if (request()->design != null) {
                    $design = $this->uploadImage('property', $request->file('design'));
                    $data1->design =  $design;
                }
                $data1->nots = $request->nots;
                $data1->flavor = $request->flavor;
                $data1->Weight = $request->Weight;
                 $data1->save();

                $address = new OrderAddress();
            
                $address->special_order_id = $data1->id;
                $address->name =$user->fname . ' ' . $user->lname;
                $address->email =$user->email;
                $address->area =$user_address->area;
                $address->street =$user_address->street;
                $address->Blvd = $user_address->Blvd;
                $address->house =$user_address->house;
                $address->phone =$user->phone;
                $address->save();
            notify()->success( __('The request has been sent.'));
            return redirect()->route('thanks');
                
        } else {
            return redirect()->back()->with('error', 'خطأ بالبيانات');
        }
            } catch (\Exception $e){

                return   $e->getMessage() ;
            }
            
    }
    
    public function showorder($id)
    {
       
        $order = Order::find($id);
        if($order){
            return view('site.homePage.ordershow', [
                 'order' =>  $order, 
            ]);
        }else{
            return redirect()->back();
        }
        

 
    }
     public function delevorder($id)
    {
       
        $order = Order::find($id);
        if($order){
            $order->status = 3 ;
            $order->save();
            notify()->success(__('Request received'));
            return redirect()->route('viewHomePage');

        }else{
            return redirect()->route('viewHomePage');
        }
        

 
    }
 
    public function delete_order(Request $request)
    {
        $order = Order::find($request->id);
        
        $order->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }
    public function delete_sorder(Request $request)
    {
        $order = Special_order::find($request->id);
        
        $order->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }


    public function cartempty( )
    {
       
        $this->cart->empty();
        notify()->success(__('The cart has been emptied'));
        return redirect()->route('viewHomePage');

    }
    
    public function discount(Request $request)
    {
       $discount = Discount::where('code', $request->code)->get()->first();
       if($discount){
        $rate = $discount->rate / 100;
        $cities = City::get();
         if($request->address_id){
           $this->address = Address::find($request->address_id);
            $add =1;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'address' =>  $this->address,
                'add' =>  $add,
                'cities' =>  $cities,
                'rate' =>  $rate,
                
            ]);
        }else{
            $add =2;
            return view('site.homePage.order', [
                'cart' => $this->cart,
                'add' =>  $add,
                'rate' =>  $rate,
                'cities' =>  $cities,

            ]);
        }
       }else{
        return redirect()->back();

       }
         
    }
    
    public function numberorder(Request $request)
    {    
          $order = Order::where('number', $request->number)->first();
          if($order){
            return view('site.homePage.ordershow', [
                 'order' =>  $order, 
            ]);
        }else{
            notify()->error( __('Verify the order number'));

            return redirect()->back();
        }
       
    }
    public function get_shipping($name)
    {       
      $city = City::where('name' , $name)->first();
       return $city; 
    }
    public function get_discount($code)
    {       
      $data = Discount::where('code' , $code)->first();
       return $data; 
    }
    function uploadImage($folder, $image)
    {
        $image->store('/', $folder);
        $filename = $image->hashName();
        $path = $filename;
        return $path;
    }

}