<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all product in the database.
     */
    public function getAllProducts()
    {
        $products = Product::all();
        if($products){
            return response()->json([
                'message' => 'All Products Retrieved Successfully',
                'data' => $products], 200);
        }
        return response()->json(['message' => 'No Products Found'], 404);
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    /**
     * Create and store a new product into the database.
     */
    public function createProduct(Request $request)
    {
        $request -> validate ([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:255',
            'price' => 'required|max:20|min:3',
            'quantity' => 'required|integer',
            'image' =>'required',
            'alert_stock' => 'required|integer',
            'category_id' =>'required|integer'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->image = $request->image;
        $product->category_id = $request->category_id;
        $product->save();

        if($product->save()){
            return response()->json([
                'message' => 'Product Created Successfully',
                'product' => $product], 201);
        }
        return response()->json(['message' => 'Product Not Created'], 400);
    }

    /**
     * Display the product by id in the database.
     */
    public function getProductById(string $id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json([
                'message' => 'Product Found',
                'product' => $product], 200);
        }
        return response()->json(['message' => 'Product Not Found'], 404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    // {
    //     //
    // }

    /**
     * Update the product by id into the database.
     */
    public function updateProduct(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:255',
            'price' => 'required|max:20|min:3',
            'quantity' => 'required|integer',
            'image' =>'required',
            'category_id' =>'required|integer'
        ]);

        $product = Product::find($id);
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->image = $request->image;
            $product->category_id = $request->category_id;
            $product->save();
            return response()->json([
                'message' => 'Product Updated Successfully',
                'product' => $product], 200);
        }
        return response()->json(['message' => 'Product Not Found'], 404);
    }

    /**
     * Remove the product by id from the database.
     */
    public function deleteProduct(string $id)
    {
        $product = Product::find($id);
        if($product){
            $product->delete();
            return response()->json([
                'message' => 'Product Deleted Successfully',
                'product_delete' => $product], 200);
        }
        return response()->json(['message' => 'Product Not Found'], 404);
    }
}