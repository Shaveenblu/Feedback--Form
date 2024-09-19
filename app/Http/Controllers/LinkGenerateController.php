<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class LinkGenerateController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('app.link_generate.index',compact('customers'));
    }
}
