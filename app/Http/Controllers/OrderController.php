<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Get all Orders.
     */
    public function getAllOrders()
    {
        // Find all Orders.
        $Orders = Order::all();
        if($Orders->isEmpty()){
            // If there are no Orders, return a 404 error.
            return response()->json([
                'message' => 'No Orders found!'
            ], 404);
        }
        // If Orders found, return a 200 response with the Orders.
        return response()->json([
            'message' => 'All Orders.',
            'data' => $Orders
        ], 200);
    }



    /**
     * Create and store a new Order.
     */
    public function createOrder(Request $request)
    {
        // Validate the request
        $validatedData =$request -> validate([
            'order_date' => 'required|date',
            'customer_id' =>'required|integer|exists:customers,id',
        ]);

        // Create a new Order
        $Order = Order::create([
            'order_date'=> $validatedData['order_date'],
            'customer_id' => $validatedData['customer_id'],
        ]);

        if ($Order) {
            // Return a success response if Order creation was successful
            return response()->json([
                'message' => 'Order created successfully.',
                'Order' => $Order
            ], 201);
        }

        // Return an error response if Order creation failed
        return response()->json(['message' => 'Order not created!'], 400);

    }



    /**
     * Get a Order by ID
     */
    public function getOrderById(string $id)
    {
        // Find the Order by ID
        $Order = Order::find($id);
        if($Order) {
            // If the Order is found, return it.
            return response()->json([
                'message' => 'Order found.',
                'Order' => $Order], 200);
        }
        // If the Order is not found, return a 404 error.
        return response()->json(['message' => 'Order not found!'], 404);
    }


    /**
     * Update a Order by ID.
     */
    public function updateOrderById(Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'order_date' => 'required|date',
            'customer_id' =>'required|integer|exists:customers,id',
        ]);
        // Find the Order by ID
        $Order = Order::find($id);

        // If Order is found, update it
        if($Order) {
            $Order->order_date = $request->order_date;
            $Order->customer_id = $request->customer_id;
            $Order->save();
        // Return a JSON response update success
        return response()->json([
            'message' => 'Order updated successfully.',
            'Order' => $Order
        ], 200);
        }
        // If the Order is not found, return a 404 error
        return response()->json(['message' => 'Order not found!'], 404);
    }


    /**
     * Remove a Order by ID
     */
    public function deleteOrderById(string $id)
    {
        // Find the Order by ID.
        $Order = Order::find($id);

        // Delete the Order
        if($Order) {
            $Order->delete();
            // Return a JSON response indicating that the Order has been deleted
            return response()->json([
                'message' => 'Order deleted successfully.',
                'deleted_Order'=>$Order], 200);
        }
        // Return a 404 response indicating that the Order was not found
        return response()->json(['message' => 'Order not found!'], 404);
    }
}
