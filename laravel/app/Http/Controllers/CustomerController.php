<?php

namespace App\Http\Controllers;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomers(){
        return response()->json(Customer::all());
    }
}
