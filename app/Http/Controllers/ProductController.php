<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function Index(){
        $Product = ProductModel::all();
        return response()->json(['message'=>'All Product List','product'=>$Product],200);
    }

    public function Store(Request $request){
        $Validator = Validator::make($request->all(),[
            'product_name'=>'required|string',
            'product_price'=>'required|numeric',
        ]);
//        if ($Validator->fails()) return response()->json([$Validator->errors()->all()],422);
        $Validated = $Validator->validate();
        $product = ProductModel::create($Validated);
        return response()->json(['message'=>'Product inserted successfully','product'=>$product],200);

    }

    public function Show($id){
        $product = ProductModel::findOrFail($id);
        return response()->json(['message'=>'Product Show successfully','product'=>$product],200);
    }

    public function Update(Request $request,$id){

        $product = ProductModel::findOrFail($id);
        $Validator = Validator::make($request->all(),[
            'product_name'=>'required|string',
            'product_price'=>'required|numeric',
        ]);
//        if ($Validator->fails()) return response()->json([$Validator->errors()->all()],422);
        $Validated = $Validator->validate();

        $product->update($Validated);
        return response()->json(['message'=>'Product Update successfully','product'=>$product],200);

    }

    public function Delete($id){
        $product = ProductModel::findOrFail($id);
        $product->delete();
        return response()->json(['message'=>'Product Delete successfully'],200);

    }
}
