<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        // return response()->json([
        //     'message'=>'Route API correct'
        // ]);
        return Product::all();

    }

    public function save(Request $request){
        try {
            $request -> validate([
            'name'=>'required|string|max:50|min:2',
            'description'=>'required|string|max:50|min:2',
            'image'=>'required|string',
        ]);

        $product = new Product();
        $product ->name = $request->input('name');
        $product ->description = $request->input('description');
        $product->image=$request->input('image');
        $product -> save();

        return response()->json([
            'message'=>'Succesful to create data!'
        ],201);

        } catch (\Exception $e) {
            return response()->json([
                    'message'=>$e
            ],500);
        }
    }
    public function delete($id){
        try{
            $product = Product::findOrFail($id);
            $product ->delete();

            return response()->json([
                'message'=>'data has been deleted
                '],201);
        }
        catch(\Exception $e){
            return response()->json([
                'message'=>$e
            ],500);
        }
    }
}
