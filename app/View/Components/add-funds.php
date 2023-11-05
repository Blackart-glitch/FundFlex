<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AddFunds extends Component
{

    public $currencies;

    /**
     * The function is a constructor that initializes the "currencies" property of an object with the
     * provided value.
     *
     * @param currencies The parameter `` is a variable that represents an array of currencies.
     * It is passed to the constructor of a class.
     */
    public function __construct($currencies)
    {
        $this->currencies = $currencies;
    }



    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('component.add-funds');
    }
}
