<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Session;
use App\Cart;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderItem;

class ProductController extends Controller
{
    //
    public function listProduct()
    {
        // code...
        $categories = Category::all();
        $items = Item::all();
        $products = Product::all();

        // dd($categories);

        return view("product.list-product",[

                                                'categories' =>$categories,
                                                'items' =>$items,
                                                'products' =>$products
                                             ]);
    }
    
    public function addProduct(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                "category_id" =>"required",
                "item_id" => "required",
                "name" =>"required",
                "remark" =>"required",
                "price" =>"required",
                "qty" =>"required",
                "remark" =>"required"
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $product = new Product();

            $product->category_id = request()->category_id;
            $product->item_id = request()->item_id;

            $product->name     = request()->name;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $product->photo = $name;

            }
            else
            {
                $product->photo = '';
            }

            $product->price   = request()->price;
            $product->qty   = request()->qty;


            $product->remark   = request()->remark;

        $product->save();

        return redirect('/admin/product/list')->with('status','Added Successfully');
    }

    public function deleteProduct()
    {
        $id = request()->id;

        Product::find($id) -> delete();

        return redirect('/admin/product/list')->with('status', 'Deleted Successfully');
    }

     public function updProduct( )
    {
        // code...
        $id = request()->id;

        $product = Product::find($id);

        $categories = Category::all();
        $items = Item::all();

        return view('product.upd-product',[
                                                "categories" =>$categories,
                                                'items' =>$items,
                                                'product' => $product
                                            ]);
    }

    public function updateProduct(Request $request)
    {
        // code...
        $validator = validator( request()->all(),

            [
                 
                "name" =>"required"
            ]);
        if($validator->fails()){
            return back()->with('status',"Please enter Data!");
        }

        $id = request()->id;

        // dd($id);

        $product =Product::find($id);

             $product->category_id = request()->category_id;
             $product->item_id = request()->item_id;

            $product->name     = request()->name;

            if($request->hasfile('photo'))
            {
                $file        = $request->file('photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();

                $file->move('images/',$name);

                $product->photo = $name;

            }
            $product->price  = request()->price;
            $product->qty  = request()->qty;


            $product->remark  = request()->remark;

        $product->save();

        return redirect('/admin/product/list')->with('status','Updated Successfully');
    }

    public function categoryView(Request $request)
    {
        // code...
        $category_id = request()->id;
        $products = Product::where("category_id","=",$category_id)->get();

        return view("product.view-product",[

                'products' => $products

        ]);
    }

    public function detailView(Request $request)
    {
        $product_id = request()->id;
        $product = Product::find($product_id);

        return view('product.detail-product',[
            'product' =>$product]);
    }

    public function getAddToCartQty(Request $request)
    {
        // code...
        $id = request()->id;
        $pqty = request()->pqty;
        $item = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->addQty($item,$id,$pqty);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getCart(Request $request)
    {
        // code...
        if(!Session::has('cart'))
        {
            return view('product.shopping-cart');

        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('product.shopping-cart',[   'products'        => $cart->items, 
                                                'totalPrice'      => $cart->totalPrice,
                                                'totalQty'        => $cart->totalQty,
                                            ]);
    }

    public function getAddToCart(Request $request)
    {
        // code...
        $id = request()->id;

        $item = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->add($item, $id);

        $request->session()->put('cart',$cart);

        return back();
    }

    public function getSubToCart(Request $request)
    {
        // code...
        $id = request()->id;

        $item = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->sub($item, $id);

        $request->session()->put('cart',$cart);

        return back();

    }

    public function getRemoveFromCart(Request $request)
    {
        // code...
        $id = request()->id;

        $item = Product::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $cart->remove($item, $id);

        $request->session()->put('cart',$cart);

        $checkcart = $request->session()->get("cart");

        if($checkcart->totalQty == 0){
            return redirect('/');
        }

        return back();

    }

    public function getClearCart(Request $request)
    {
        // code...
        if(Session::has('cart')){
            $request->session()->forget('cart');
            return redirect("/");
        }else{
            return redirect("/");
        }
    }

    public function getOrder(Request $request)
    {
        // code...
        if(!Session('cart')){
            return redirect('/');
        }

        $oldCart = Session('cart');
        $cart = new Cart($oldCart);

        $order = new Order();

            $order->user_id  = auth()->user()->id;
            $order->totalPrice  = $cart->totalPrice;
            $order->totalQty  = $cart->totalQty;
            $order->remark  = "";

        $order->save();
        

        $products = $cart->items;

        foreach($products as $product){

            $orderitem = new OrderItem();


                $orderitem->order_id  =$order->id;
                $orderitem->user_id  = auth()->user()->id;;

                $orderitem->product_id  =$product['item']['id'];
                $orderitem->name  =$product['item']['name'];
                $orderitem->price  =$product['item']['price'];
                $orderitem->qty  =$product['qty'];
                $orderitem->amount  =$product['item']['price'] * $product['qty'];
                $orderitem->remark  ="";

            $orderitem->save();

        } 

        $order = Order::find($order->id);
        $orderitems = OrderItem::where('order_id','=',$order->id)->get();

        if(Session::has('cart')){
            $request->session()->forget('cart');
        }

        return view('boucher',[
                                'order' =>$order,
                                'orderitems' =>$orderitems

        ]);

    }

    public function getPayment(Request $request)
    {
        // code...
        $order_id = request()->order_id;

        $payment_amount = Order::where("id","=","$order_id")->value('totalPrice');

        return view('payment',[
                                'order_id' => $order_id,
                                "payment_amount" => $payment_amount

        ]);
    }

    public function createPayment(Request $request)
    {

        $payment = new Payment();

            $payment->order_id      = request()->order_id;
            $payment->amount        = request()->payment_amount;
            $payment->phone         = request()->phone;
            $payment->transaction   = request()->transaction;

        $payment->save();

        return redirect("/")->with('info',"အားပေးမှုကို ကျေးဇူးတင်ပါသည်");

    }

}
