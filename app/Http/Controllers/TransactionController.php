<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Get all Transactions.
     */
    public function getAllTransactions()
    {
        // Find all Transactions.
        $Transactions = Transaction::all();
        if($Transactions->isEmpty()){
            // If there are no Transactions, return a 404 error.
            return response()->json([
                'message' => 'No Transactions found!'
            ], 404);
        }
        // If Transactions found, return a 200 response with the Transactions.
        return response()->json([
            'message' => 'All Transactions.',
            'data' => $Transactions
        ], 200);
    }



    /**
     * Create and store a new Transaction.
     */
    public function createTransaction(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'status' => 'required|max:50',
            'order_id' => 'required|integer|exists:orders,id' // Typo fixed here
        ]);

        // Create a new Transaction
        $transaction = Transaction::create([
            'status' => $validatedData['status'],
            'order_id' => $validatedData['order_id']
        ]);

        if ($transaction) {
            // Return a success response if Transaction creation was successful
            return response()->json([
                'message' => 'Transaction created successfully.',
                'transaction' => $transaction
            ], 201);
        }

        // Return an error response if Transaction creation failed
        return response()->json(['message' => 'Transaction not created!'], 400);
    }




    /**
     * Get a Transaction by ID
     */
    public function getTransactionById(string $id)
    {
        // Find the Transaction by ID
        $Transaction = Transaction::find($id);
        if($Transaction) {
            // If the Transaction is found, return it.
            return response()->json([
                'message' => 'Transaction found.',
                'Transaction' => $Transaction], 200);
        }
        // If the Transaction is not found, return a 404 error.
        return response()->json(['message' => 'Transaction not found!'], 404);
    }


    /**
     * Update a Transaction by ID.
     */
    public function updateTransactionById(Request $request, string $id)
{
    // Validate incoming data
    $request->validate([
        'status' => 'required|max:50',
        'order_id' => 'required|integer|exists:orders,id' // Typo fixed here
    ]);

    // Find the Transaction by ID
    $transaction = Transaction::find($id);

    // If Transaction is found, update it
    if ($transaction) {
        $transaction->status = $request->status;
        $transaction->order_id = $request->order_id;
        $transaction->save();

        // Return a JSON response with the updated Transaction information
        return response()->json([
            'message' => 'Transaction updated successfully.',
            'transaction' => $transaction
        ], 200);
    }

    // If the Transaction is not found, return a 404 error
    return response()->json(['message' => 'Transaction not found!'], 404);
}



    /**
     * Remove a Transaction by ID
     */
    public function deleteTransactionById(string $id)
    {
        // Find the Transaction by ID.
        $Transaction = Transaction::find($id);

        // Delete the Transaction
        if($Transaction) {
            $Transaction->delete();
            // Return a JSON response indicating that the Transaction has been deleted
            return response()->json([
                'message' => 'Transaction deleted successfully.',
                'deleted_Transaction'=>$Transaction], 200);
        }
        // Return a 404 response indicating that the Transaction was not found
        return response()->json(['message' => 'Transaction not found!'], 404);
    }
}
