<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Get all users.
     */
    public function getAllCustomers()
    {
        $customers = Customer::all();
        if($customers->isEmpty()){
            return response()->json([
                'massage' => 'No Customers Found!',
            ], 404);
        }
        return response()->json([
            'massage' => 'All Customers.',
            'data' => $customers
        ], 200);
    }

    /**
     * Create and store new customer.
     */
    public function createCustomer(Request $request)
    {
        // Validate the request data
        $validatedData = $request -> validate ([
            'name' => 'required|max:255',
            'stall' => 'required|max:255',
            'phone' =>'required|max:50',
            'email' =>'required|email|max:255',
            'address' =>'required|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        // Create a new customer
        $customer = Customer::create([
            'name' => $validatedData['name'],
            'stall' => $validatedData['stall'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'address' => $validatedData['address'],
            'user_id'=>$validatedData['user_id']
        ]);

        // Return a success response
        if($customer){
            return response()->json([
                'massage' => 'Customer Created Successfully.',
                'data' => $customer
            ], 201);
        }
        // Return a failure response
        return response()->json(['massage' => 'Customer Not Created.'], 400);
    }

    /**
     * Get a customer by ID
     */
    public function getCustomerById(string $id)
    {
        $customer = Customer::with(['orders.product:id,name'])->find($id, ['id', 'name', 'email', 'phone', 'address']);
        // Return a success response if customer found
        if($customer){
            $customer->orders = $customer->orders()->orderBy('order_date')->get();
            return response()->json([
               'massage' => 'Customer Found.',
                'data' => $customer
            ], 200);
        }
        // Return a failure response if customer not found
        return response()->json(['massage' => 'Customer Not Found.'], 404);
    }



    /**
     * Update a customer by ID.
     */
    public function updateCustomerById(Request $request, string $id)
    {
        // Validate the request
        $request -> validate([
            'name' => 'required|max:255',
            'stall' => 'required|max:255',
            'phone' =>'required|max:50',
            'email' =>'required|email|max:255',
            'address' =>'required|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);
        // Find the customer by ID and update it
        $customer = Customer::find($id);
        // Update the customer
        if ($customer){
            $customer->name = $request->name;
            $customer->stall = $request->stall;
            $customer->phone = $request->phone;
            $customer->email= $request->email;
            $customer->address = $request->address;
            $customer->user_id= $request->user_id;
            $customer->save();
            // Return a successful response with updated data
            return response()->json([
               'massage' => 'Customer Updated Successfully.',
                'data' => $customer
            ], 200);
        }
        // Return a 404 response indicating that the customer was not found
        return response()->json(['massage' => 'Customer Not Found!'], 404);
    }

    /**
     * Delete a customer by ID.
     */
    public function deleteCustomerById(string $id)
    {
        // Find the customer by ID and delete it
        $customer = Customer::find($id);
        // Delete the customer
        if ($customer){
            $customer->delete();
            // Return a successful response with deleted data
            return response()->json([
              'massage' => 'Customer Deleted Successfully.',
                'data' => $customer
            ], 200);
    }
    // Return a 404 response indicating that the customer was not found
    return response()->json(['massage' => 'Customer Not Found!'], 404);
    }
}