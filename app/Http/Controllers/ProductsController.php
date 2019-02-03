<?php
/**
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the prducts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->forget('product');
        $products = Product::paginate(25);

        return view('products.index', compact('products', $products));
    }
    /**
     * Show the step 1 Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep1(Request $request)
    {
        $product = $request->session()->get('product');
//        $products = [
//            $product = $request->session()->get('product'),
        $categories = ProductCategory::all();
//        ];
        return view('products.create-step1', compact('product', 'categories'));
    }
    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products',
            'amount' => 'required|numeric',
            'company' => 'required',
            'available' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);
        if (empty($request->session()->get('product'))) {
            $product = new Product();
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        } else {
            $product = $request->session()->get('product');
            $product->fill($validatedData);
            $request->session()->put('product', $product);
        }
        return redirect('/products/create-step2');
    }

    /**
     * Show the step 2 Form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep2(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step2', compact('product', $product));
    }

    /**
     * Post Request to store step1 info in session
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postCreateStep2(Request $request)
    {
        $product = $request->session()->get('product');
        if (!isset($product->productImg)) {
            $request->validate([
                'productimg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $fileName = "productImage-" . time() . '.' . request()->productimg->getClientOriginalExtension();
            $request->productimg->move(public_path() . '/storage/productimg/', $fileName);
//            $file->move(public_path().'/files/', $name);
            $product = $request->session()->get('product');
            $product->productImg = '/storage/productimg/' . $fileName;
            $request->session()->put('product', $product);
        }
        return redirect('/products/create-step3');
    }
    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function removeImage(Request $request)
    {
        $product = $request->session()->get('product');
        $product->productImg = null;
        return view('products.create-step2', compact('product', $product));
    }
    /**
     * Show the Product Review page
     *
     * @return \Illuminate\Http\Response
     */
    public function createStep3(Request $request)
    {
        $product = $request->session()->get('product');
        return view('products.create-step3', compact('product', $product));
    }
    /**
     * Store product
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->session()->get('product');
        $product->save();
        return redirect('/products');
    }

    public function viewproduct($id)
    {

        $product = Product::findOrFail($id);


        return view('products.viewproduct', compact('product'));
    }

}
