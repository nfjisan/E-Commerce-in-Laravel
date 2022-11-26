<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_catagory(){
        $data=catagory::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request){
        $data= new Catagory;
        $data->catagory_name=$request->catagory;
        $data->save();

        return redirect()->back()->with('message','catagory added successfully');
    }

    public function delete_catagory($id){
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message','catagory Deleted successfully');
    }

    public function view_product(){

        $catagory = Catagory::all();
        return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request){

        $product=new product;

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->catagory=$request->catagory;

        $image=$request->image;
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        // $imagename=time().'.'.$image->getClintOriginalExtension();
        $request->image->move('product',$filename);
        $product->image=$filename;

        $product->save();

        return redirect()->back()->with('message','product Added successfully');
    }

    public function show_product(){
        $product=product::all();
        return view('admin.showProduct',compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','product Deleted successfully');
    }

    public function update_product($id){
        $product=product::find($id);
        $catagory=catagory::all();
        return view('admin.update_product',compact('product','catagory'));
    }

    public function CnfmUpdateProduct(Request $request, $id){
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->discount_price;
        $product->catagory=$request->catagory;

        $image=$request->image;

        if($image){

        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product',$filename);
        $product->image=$filename;

        }

        $product->save();

        return redirect()->back()->with('message','product Updated successfully');


    }

    public function order(){
        $order=order::all();
        return view('admin.order',compact('order'));
    }

    public function delevered($id){

        $order=order::find($id);

        $order->delivery_status="delivered";
        $order->payment_status="paid";

        $order->save();

        return redirect()->back();
    }
}
