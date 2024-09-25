<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerFormUrl;
use App\Models\FeedBackForm;
use App\Models\Question;
use App\Models\ResponseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LinkGenerateController extends Controller
{
    public function generate_link()
    {
        $customers = DB::table('customers')
            ->leftJoin('customer_form_urls', 'customer_form_urls.customer_id', '=', 'customers.id')
            ->where('date','=',null)
            ->select('customers.*')
            ->get();
        return view('app.link_generate.index',compact('customers'));
    }

    public function copy_link()
    {
         return view('app.link_generate.copy_link');
    }


    public function customer_form_page($unique_id,$name){
        $customer_form_url = CustomerFormUrl::where('unique_id',$unique_id)->first();
        if($customer_form_url){
            return view('app.link_generate.form_page');
        }else{
            return abort(404);
        }
    }

    public function customer_form_data_store(Request $request)
    {
        $request->validate([
             'xzR5hRwvY'=>'required',
             'NNJEvpDTlK'=>'required',
             'customer_name'=>'required',
             'customer_phone_number'=>'required'
         ]);

        $part = $request->except('_token');
        session(['session_first' =>$part]);


        return 'done';
    }
}
