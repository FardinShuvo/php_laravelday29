<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
//    protected $Product;
   private $product;
   private $products;

    public function addProduct()
    {
        return view('product.add');
    }
    public function newProduct(Request $request)
    {
        Product::newProduct($request);
        return redirect()->back()->with('message', 'Product info save successfully');
    }
    public function manage()
    {

        $this->products = Product::orderBy('id', 'desc')->get();
        return view('product.manage-product', ['products' => $this->products]);
    }
    public function edit($id)
    {
        $this->product = Product::find($id);

        return view('product.edit-product', ['product' => $this->product]);
    }
    public function update(Request $request, $id)
    {
       Product::updateProduct($request);
        return redirect('/manage-product')->with('message', 'Product info delete successfully');
    }
}
