<?php

namespace App\Http\Controllers\Admin;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\Weight;
use App\Models\Flaver;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $date = Carbon::now()->subHour(12);
        $orders = Order::where('status','1')->get()->count();
        $orderstoday = Order::where('created_at', '<=', $date)->get()->count();
        $orderssh = Order::where('status','2')->get()->count();
        $prducts = Product::get()->count();
        $prductsem = Product::where('quantity',0.00)->get()->count();
        $users = User::get()->count();

        return view('admin.home.index', [
            'orders' => $orders,       
            'orderstoday' => $orderstoday,       
            'orderssh' => $orderssh,       
            'prducts' => $prducts,       
            'users' => $users,
            'prductsem' => $prductsem,       
        ]);
    }
    public function contact(){
        
        $contact = Contact::latest()->get();

        return view('admin.contact.index', [
            'contact' => $contact,       
        ]);
    }
    public function delete_contact(Request $request){

        $contact = Contact::find($request->id);  
        if( $contact){

            $contact->delete();
      
            return response()->json([
                'status' => true,
                'msg' => 'deleted!',
                'id' =>  $request -> id
            ]);
        } 
 }


 /////////weight
 public function weights_list()
    {
        $weights = Weight::get();
        return view('admin.flavors_weight.weights', [
            'weights' => $weights,       
        ]);
    }

public function weight_save(Request $request)
    {
        $request->validate([
            'name' => 'required',
 
        ]);
        $weight =new Weight(); 
        $weight->name =  $request->name;
        $weight->name_en =  $request->name_en; 
        $weight->save();
 
          if($weight) {
            notify()->success('تم اضافة وزن !');

              return redirect()->back();
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }    

 
    }

public function delete_weight(Request $request)
    {  
        $weight = Weight::find($request->id);
        
        $weight->delete();
                            
        return response()->json([
            'status' => true,
            'id' => $request->id,
        ]);

    }


    
 /////////flavors
 public function flavors_list()
 {
     $flavors = Flaver::get();
     return view('admin.flavors_weight.flavers', [
         'flavors' => $flavors,       
     ]);
 }

public function flavor_save(Request $request)
 {
     $request->validate([
         'name' => 'required',

     ]);
     $flavors =new Flaver(); 
     $flavors->name =  $request->name;
     $flavors->name_en =  $request->name_en; 
     $flavors->save();

       if($flavors) {
         notify()->success('تم اضافة نكهة !');

           return redirect()->back();
        } else  {
            return redirect()->back()->with('error', 'There is an error in your data');
       }    


 }

public function delete_flavor(Request $request)
 {  
     $flavor = Flaver::find($request->id);
     
     $flavor->delete();
                         
     return response()->json([
         'status' => true,
         'id' => $request->id,
     ]);

 }
}
