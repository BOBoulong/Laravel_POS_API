<?php

namespace App\Http\Controllers;

use App\Models\Order_Detail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Get all OrderDetails
     */
    public function getAllOrderDetails()
    {
        // Find all OrderDetails
        $OrderDetails = Order_Detail::all();
        if($OrderDetails->isEmpty()){
            // If no OrderDetails are found, return a 404 error
            return response()->json([
                'message' => 'No OrderDetails Found!'
            ], 404);
        }
        // If OrderDetails are found, return them as JSON.
        return response()->json([
            'message' => 'All OrderDetails.',
            'data' => $OrderDetails
        ], 200);
    }

    /**
     * Create and store a new OrderDetail
     */
    public function createOrderDetail(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer',
            'unit_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Validates decimal up to 2 decimal places
            'discount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        // Create the OrderDetail
        $orderDetail = Order_Detail::create([
            'order_id' => $validatedData['order_id'],
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
            'unit_price' => $validatedData['unit_price'],
            'discount' => $validatedData['discount'],
            'amount' => $validatedData['amount']
        ]);

        if ($orderDetail) {
            // Return a JSON response indicating success
            return response()->json([
                'message' => 'OrderDetail created successfully.',
                'OrderDetail' => $orderDetail
            ], 201);
        }
        // Return a JSON response indicating failure
        return response()->json(['message' => 'OrderDetail not created!'], 400);
    }


    /**
     * Get OrderDetail by id from table in the database.
     */
    public function getOrderDetailById(string $id)
    {
        // Find the OrderDetail by ID
        $OrderDetail = Order_Detail::find($id);
        // If the category is found, return it
        if($OrderDetail){
            return response()->json([
                'message' => 'OrderDetail Found',
                'OrderDetail' => $OrderDetail], 200);
        }
        // If the category is not found, return a 404 error
        return response()->json(['message' => 'OrderDetail Not Found!'], 404);
    }


    /**
     * Update a OrderDetail by ID
     */
    public function updateOrderDetailById(Request $request, string $id)
    {
        // Validate incoming data
        $request -> validate([
            'order_id' => 'required|integer|exists:orders,id',
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer',
            'unit_price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'], // Validates decimal up to 2 decimal places
            'discount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/']
        ]);

        // Find the OrderDetail by ID
        $OrderDetail = Order_Detail::find($id);

        // If the OrderDetail is found, update it
        if($OrderDetail){
            // Set the new OrderDetail information
            $OrderDetail -> order_id = $request -> order_id;
            $OrderDetail -> product_id = $request -> product_id;
            $OrderDetail -> quantity = $request -> quantity;
            $OrderDetail -> unit_price = floatval($request->unit_price);
            $OrderDetail -> discount = floatval($request->discount);
            $OrderDetail -> amount = floatval($request->amount);
            $OrderDetail->save();

            // Return a JSON response indicating success
            return response()->json([
                'message' => 'OrderDetail Updated Successfully.',
                'OrderDetail' => $OrderDetail], 200);
        }
        // If the OrderDetail is not found, return a 404 error
        return response()->json(['message' => 'OrderDetail Not Found!'], 404);
    }

    /**
     * Remove a OrderDetail by ID.
     */
    public function deleteOrderDetailById(string $id)
    {
        // Find the OrderDetail by ID
        $OrderDetail = Order_Detail::find($id);
        // If the OrderDetail is found, delete it
        if($OrderDetail){
            $OrderDetail->delete();
            return response()->json([
                'message' => 'OrderDetail Deleted Successfully.',
                'OrderDetail_delete' => $OrderDetail], 200);
        }
        // If the OrderDetail is not found, return a 404 error
        return response()->json(['message' => 'OrderDetail Not Found!'], 404);
    }
}