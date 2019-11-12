<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {    
        $product = Product::all();
        return view('pages.admin.product', compact('product'));
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'prodname'     => 'required|string',
            'proddesc'      => 'required|string',
            'prodstock'         => 'required',
            'category'      => 'required | string'
        ]);

            if($validator->passes())
            {
                $product = new Product;
                $product->name = $request->prodname;
                $product->stocks = $request->prodstock;
                $product->category = $request->category;
                $product->description = $request->proddesc;
               // $product->save();

                if($product->save()){
                    $message = ['success' => true];
                } else {
                    $message = ['success' => false];
                }
                
                return response()->json($message);
            } 


        return response()->json($validator->errors());


    }

    public function get_product_details(Request $request){
        $product = DB::table('products')
        ->select('products.id', 'products.stocks', 'products.name', 'products.category', 'products.description')
        ->where('products.id', $request->id)->get();
        return json_decode($product);
    }

    public function update_product_details(Request $request){
        $validator = Validator::make($request->all(),[
            'edit_prodname'     => 'required|string',
            'edit_proddesc'      => 'required|string',
            'edit_prodstock'         => 'required',
            'edit_category'      => 'required | string'
        ]);

        if($validator->passes())
        {
            $product = Product::find($request->product_value);
            $product->name = $request->edit_prodname;
            $product->stocks = $request->edit_prodstock;
            $product->description = $request->edit_proddesc;
            $product->category = $request->edit_category;

            if($product->save())
            {
                $message = ['success' => true];
            }
            else 
            {
                $message = ['success' => false];
            }

            return response()->json($message);
        }

        return response()->json($validator->errors());
    }

    public function get_available_stocks(Request $request)
    {
        $regularYakult = DB::table('products')->select('products.stocks')->where('category', 'Regular Yakult')->get();
        $yakultLight = DB::table('products')->select('products.stocks')->where('category', 'Yakult Light')->get();

        $message = ['regularyakult' => $regularYakult, 'yakultlight' => $yakultLight];
        return response()->json($message);
    }

    public function get_booking_route(Request $request)
    {
        // get booking route based on user assigned id
    }

    public function list_product(Request $request)
    {
        $product = DB::table('products')
        ->select('products.stocks', 'products.name')
        ->get();
        return json_decode($product);
    }


    public function deduct_yakult_light(Request $request)
    {
        $yakult_light = DB::table('products')
        ->select('products.id', 'products.stocks', 'products.name', 'products.category', 'products.description')
        ->where('products.name', 'Yakult Light')->get();

        
        //error_log($yakult_light[0]->stocks);

        $id = $yakult_light[0]->id;
        $subtract_product = (int) $yakult_light[0]->stocks - (int) $request->units;
        $product = Product::find($id);
        $product->stocks = $subtract_product;
        $product->save();
        error_log($subtract_product);
        return json_decode($yakult_light);
    }


    public function deduct_yakult(Request $request)
    {
        $yakult = DB::table('products')
        ->select('products.id', 'products.stocks', 'products.name', 'products.category', 'products.description')
        ->where('products.name', 'Yakult')->get();

        $id = $yakult[0]->id;
        $subtract_product = (int) $yakult[0]->stocks - (int) $request->units;
        $product = Product::find($id);
        $product->stocks = $subtract_product;
        $product->save();
        error_log($subtract_product);
        return json_decode($yakult);
    }
}
