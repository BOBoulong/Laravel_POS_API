<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get all products
     */
    public function getAllProducts()
    {
        // Find all products
        $products = Product::all();
        if($products->isEmpty()){
            // If no products are found, return a 404 error
            return response()->json([
                'message' => 'No Products Found!'
            ], 404);
        }
        // If products are found, return them as JSON.
        return response()->json([
            'message' => 'All Products.',
            'data' => $products
        ], 200);
    }

    /**
     * Create and store a new product
     */
    public function createProduct(Request $request)
    {
         // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'image' => 'required',
            'alert_stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        // Create the product
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'image' => $validatedData['image'],
            'alert_stock' => $validatedData['alert_stock'],
            'category_id' => $validatedData['category_id']
        ]);

        if($product){
            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Product created successfully.',
                'product' => $product
                ], 201);
        }
        // Return a JSON response indicating failure
        return response()->json(['message' => 'Product not created!'], 500);
}

    /**
     * Get product by id from table in the database.
     */
    public function getProductById(string $id)
    {
        // Find the product by ID
        $product = Product::find($id);
        // If the category is found, return it
        if($product){
            return response()->json([
                'message' => 'Product Found',
                'product' => $product], 200);
        }
        // If the category is not found, return a 404 error
        return response()->json(['message' => 'Product Not Found!'], 404);
    }


    /**
     * Update a product by ID
     */
    public function updateProductById(Request $request, string $id)
    {
        // Validate incoming data
        $request -> validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|max:255',
            'price' => 'required|max:20|min:3',
            'quantity' => 'required|integer',
            'image' =>'required',
            'alert_stock' => 'required|integer',
            'category_id' =>'required|integer'
        ]);

        // Find the product by ID
        $product = Product::find($id);

        // If the product is found, update it
        if($product){
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->image = $request->image;
            $product->alert_stock = $request->alert_stock;
            $product->category_id = $request->category_id;
            $product->save();

            // Return a JSON response indicating success
            return response()->json([
                'message' => 'Product Updated Successfully.',
                'product' => $product], 200);
        }
        // If the product is not found, return a 404 error
        return response()->json(['message' => 'Product Not Found!'], 404);
    }

    /**
     * Remove a product by ID.
     */
    public function deleteProductById(string $id)
    {
        // Find the product by ID
        $product = Product::find($id);
        // If the product is found, delete it
        if($product){
            $product->delete();
            return response()->json([
                'message' => 'Product Deleted Successfully.',
                'product_delete' => $product], 200);
        }
        // If the product is not found, return a 404 error
        return response()->json(['message' => 'Product Not Found!'], 404);
    }
}