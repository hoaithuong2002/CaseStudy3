<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->paginate(4);
        return view('product.index',compact('products'));
    }

    public function create()
    {

        return view('product.create');

    }
    public function store(Request $request)
    {
        $product= new Product();
        $product->fill($request->all());

        $path = $request->file('image')->store('avatars','public');
        $product->image = $path;

        $product->save();
        toastr()->success('Congratulations on your successful creation!!!');
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();
        toastr()->success('You have successfully updated your information!!!');
        sleep(3);
        return redirect()->route('product');
    }

    public function destroy($id):RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->success('You have remove to public!');
        return redirect()->route('product.index');

    }

    public function search(Request $request)
    {
        $search= $request->keyword;
        $products = DB::table('products')->where('name','LIKE',"%$search%")->paginate(4);
        return view('product.index',compact('products'));
    }


}
