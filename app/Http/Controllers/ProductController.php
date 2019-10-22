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
}
