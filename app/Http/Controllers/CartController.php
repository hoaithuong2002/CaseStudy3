<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function addToCart($id): \Illuminate\Http\RedirectResponse
    {
        $product = Product::find($id);
        $oldCart = session('cart');
        $newCart = new Cart($oldCart);
        $newCart->addToCart($id, $product);
        Session::put('cart', $newCart);
        return back();
    }

    function index() {
        $cart = \session('cart');
        return view('front-end.shop.cart.cart', compact('cart'));
    }
    function removeProduct($id): \Illuminate\Http\RedirectResponse
    {
        $oldCart = session()->get('cart');
        $newCart = new Cart($oldCart);
        $newCart->deleteProduct($id);
        session()->put('cart', $newCart);
        return back();
    }

    function updateCart(Request $request): \Illuminate\Http\RedirectResponse
    {

        foreach ($request->quantity_product as $key => $value) {
            $oldCart = session()->get('cart');
            $newCart = new Cart($oldCart);
            $newCart->updateCart($key, $value);
            session()->put('cart', $newCart);
        }

        return back();
    }

    function deleteCart()
    {
        session()->forget('cart');
        return redirect('/');
    }

    function showFormCheckOut()
    {
        $cart = session()->get('cart');

        return view('front-end.check-out.checkout', compact('cart'));
    }

    function checkOut(Request $request) {
        $cart = session()->get('cart');

        DB::beginTransaction();

        try {
            $customer = new Customer();
            $customer->fill($request->all());
            $customer->save();

            $bill = new Bill();
            $bill->customer_id = $customer->id;
            $bill->date_pay = date('Y-m-d');
            $bill->status = self::BILL_PENDING;
            $bill->total_money = $cart->totalPrice;
            $bill->save();

            foreach ($cart->items as $key => $item) {
                $billDetail = new BillDetail();
                $billDetail->product_id = $key;
                $billDetail->bill_id = $bill->id;
                $billDetail->total_Qty = $item['totalQty'];
                $billDetail->total_Price = $item['totalPrice'];
                $billDetail->save();
            }

            DB::commit();
            session()->forget('cart');
            return redirect('/');
        }catch (\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }

    }

    function updateProduct(Request $request): \Illuminate\Http\JsonResponse
    {
        $idProduct = $request->idProduct;

        return response()->json(1);
    }


}
