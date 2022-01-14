<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.products', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'cost_price' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        try {
            DB::beginTransaction();

            $products = new Product();

            $products->title = $request->title;
            $products->category_id = $request->category_id;
            $products->description = $request->description;
            $products->cost_price = $request->cost_price;
            $products->price = $request->price;
            $products->save();

            DB::commit();

            return redirect()->route('products.index')->with('message', 'Product created successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('products.index')->with('message', 'Product creation failed');
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'cost_price' => 'nullable',
            'price' => 'nullable',
        ]);

        try {
            DB::beginTransaction();
            $product->title = $request->title;
            $product->category_id = $request->category_id;
            $product->description = $request->description;
            $product->cost_price = $request->cost_price;
            $product->price = $request->price;

            $product->save();
            DB::commit();

            return redirect()->route('products.index')->with('message', 'Product updated successfully');
        } catch (\Throwable $th) {

            DB::rollBack();
            return redirect()->route('products.index')->with('message', 'Product update failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product deleted successfully !');
    }
}
