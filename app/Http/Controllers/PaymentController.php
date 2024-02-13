<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Get all Payments.
     */
    public function getAllPayments()
    {
        // Find all Payments.
        $payments = Payment::all();
        if($payments->isEmpty()){
            // If there are no Payments, return a 404 error.
            return response()->json([
                'message' => 'No Payments found!'
            ], 404);
        }
        // If Payments found, return a 200 response with the Payments.
        return response()->json([
            'message' => 'All Payments.',
            'data' => $payments
        ], 200);
    }



    /**
     * Create and store a new Payment.
     */
    public function createPayment(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'payment_date' => 'required|date',
            'order_id' => 'required|integer|exists:orders,id' // Typo fixed here
        ]);

        // Create a new Payment
        $payment = Payment::create([
            'name' => $validatedData['name'],
            'amount' => $validatedData['amount'],
            'payment_date' => $validatedData['payment_date'],
            'order_id' => $validatedData['order_id']
        ]);

        if ($payment) {
            // Return a success response if Payment creation was successful
            return response()->json([
                'message' => 'Payment created successfully.',
                'payment' => $payment
            ], 201);
        }

        // Return an error response if Payment creation failed
        return response()->json(['message' => 'Payment not created!'], 400);
    }




    /**
     * Get a Payment by ID
     */
    public function getPaymentById(string $id)
    {
        // Find the Payment by ID
        $payment = Payment::find($id);
        if($payment) {
            // If the Payment is found, return it.
            return response()->json([
                'message' => 'Payment found.',
                'Payment' => $payment], 200);
        }
        // If the Payment is not found, return a 404 error.
        return response()->json(['message' => 'Payment not found!'], 404);
    }


    /**
     * Update a Payment by ID.
     */
    public function updatePaymentById(Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'name' => 'required|max:255',
            'amount' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'payment_date' => 'required|date',
            'order_id' => 'required|integer|exists:orders,id' // Typo fixed here
        ]);

        // Find the Payment by ID
        $payment = Payment::find($id);

        // If Payment is found, update it
        if ($payment) {
            $payment->name = $request->name;
            $payment->amount = $request->amount;
            $payment->payment_date = $request->payment_date;
            $payment->order_id = $request->order_id;
            $payment->save();

            // Return a JSON response with the updated Payment information
            return response()->json([
                'message' => 'Payment updated successfully.',
                'Payment' => $payment
            ], 200);
        }

        // If the Payment is not found, return a 404 error
        return response()->json(['message' => 'Payment not found!'], 404);
    }




    /**
     * Remove a Payment by ID
     */
    public function deletePaymentById(string $id)
    {
        // Find the Payment by ID.
        $payment = Payment::find($id);

        // Delete the Payment
        if($payment) {
            $payment->delete();
            // Return a JSON response indicating that the Payment has been deleted
            return response()->json([
                'message' => 'Payment deleted successfully.',
                'deleted_Payment'=>$payment], 200);
        }
        // Return a 404 response indicating that the Payment was not found
        return response()->json(['message' => 'Payment not found!'], 404);
    }
}