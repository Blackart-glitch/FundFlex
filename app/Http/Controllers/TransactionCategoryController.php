<?php

namespace App\Http\Controllers;

use App\Models\Transaction_category;
use App\Http\Requests\StoreTransaction_categoryRequest;
use App\Http\Requests\UpdateTransaction_categoryRequest;
use App\Models\TransactionCategoryMapping;
use Illuminate\Http\Request;
use App\Models\TransactionCategory;
use App\Models\Transaction;

class TransactionCategoryController extends Controller
{


    public function getCategorylinks($TransactionId)
    {
        $category = TransactionCategoryMapping::where('transaction_id', $TransactionId)->get();

        return $category;
    }


    /**
     * The function "link_txn" validates if a category and transaction exist in the database, creates a new
     * transaction category mapping record, and returns the id of the created record.
     *
     * @param txn_id The txn_id parameter is the ID of the transaction that you want to link to a category.
     * @param category_id The category_id parameter is the ID of the category that you want to link to a
     * transaction.
     *
     * @return an array with the following keys and values:
     * - 'status' => 'error' or 'success' depending on the outcome of the function
     * - 'message' => 'Category or transaction does not exist' if either the category or transaction does
     * not exist in the database
     * - 'id' => the id of the newly created transaction category mapping record if the function is
     * successful in
     */
    public function link_txn($txn_id, $category_id)
    {
        //validates that the category and transaction exist in the database\
        $category = TransactionCategory::find($category_id);
        $transaction = Transaction::find($txn_id);


        if (!$category || !$transaction) {
            return ([
                'status' => 'error',
                'message' => 'Category or transaction does not exist',
            ]);
        }


        //creates a new transaction category mapping record in the database
        $transaction_category_mapping = TransactionCategoryMapping::create([
            'transaction_id' => $txn_id,
            'category_id' => $category_id,
        ]);

        //returns the id of the transaction category mapping record
        return ([
            'status' => 'success',
            'id' => $transaction_category_mapping->id
        ]);
    }
}
