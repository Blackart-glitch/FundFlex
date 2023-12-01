<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Receipt extends Component
{

    public $transaction;


    /**
     * The function is a constructor that assigns a value to the "transaction" property of the class.
     *
     * @param transaction The transaction parameter is a variable that represents a transaction object or
     * data. It is being assigned to the  property of the class.
     */
    public function __construct($transaction)
    {
        $this->transaction = $transaction;
    }



    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.receipt');
    }
}
