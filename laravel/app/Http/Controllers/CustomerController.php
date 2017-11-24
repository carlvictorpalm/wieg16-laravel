<?php

namespace App\Http\Controllers;
use App\Address;
use App\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function showCustomers(){
        return response()->json(Customer::all());
    }

    public function showIdCustomer($id){

        $customer = Customer::Find($id);
        if($customer == true){
            return response()->json($customer);
        }else{
            return response()->json(["Message" => "Customer not found"], 404);
        }
    }

    public function showCustomerAddress($id){
        $address = Address::select('street', 'postcode', 'city')->where('customer_id', $id)->get();

        if(count($address) > 0){
            return response()->json($address);
        }else{
            return response()->json(["Message" => "Customer not found"], 404);
        }

    }
}
