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
            'payment_method' => 'required|string'
        ]);

        // Create a new Payment
        $payment = Payment::create([
            'payment' => $validatedData['payment_method'],
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
            'payment_method' => 'required|string'
        ]);

        // Find the Payment by ID
        $payment = Payment::find($id);

        // If Payment is found, update it
        if ($payment) {
            $payment -> payment_method = $request -> payment_method;
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