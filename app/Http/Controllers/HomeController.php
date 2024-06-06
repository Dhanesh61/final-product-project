<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Excel;
use App\Models\Hotel;
use App\Models\Website;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user(); 

        // Check if the user is an admin
        if ($user->isAdmin()) {
            $productCount = Product::count();
            $purchaseCount = Purchase::count();
            $excelCount = Excel::count(); 
            $roomCount = Hotel::count();
            $websiteCount = Website::count();
            return view('home', compact('productCount','purchaseCount','excelCount','roomCount','websiteCount'));
             
        } else {
            $products = Product::paginate(6);
            return view('products', compact('products'));
        }
    }

    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_id" => $product->id,
                "product_name" => $product->name,
                "photo" => $product->image,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return response()->json(['message' => 'Cart successfully updated!']);
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return response()->json(['message' => 'Product successfully removed!']);
        }
    }

    
}
