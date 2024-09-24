<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class LinkGenerateController extends Controller
{
    public function generate_link()
    {
        $customers = Customer::all();
        return view('app.link_generate.index',compact('customers'));
    }

    public function copy_link()
    {
         return view('app.link_generate.copy_link');
    }


    public function test_generator(string  $unique_id, string $name){
       // return ' unique id ' . $unique_id. ' name ' . $name;

        return url()->current();
    }



}
