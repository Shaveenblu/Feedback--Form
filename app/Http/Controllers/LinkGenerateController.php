<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerFormUrl;
use App\Models\FeedBackForm;
use App\Models\Hotel;
use App\Models\Question;
use App\Models\ResponseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

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
            session(['customer_id' => $customer_form_url->customer_id]);
            if(session()->has('session_first')){
                return redirect()->route('hotel_standard');
            }else{
                return view('app.link_generate.form_page');
            }
        }else{
            return abort(404);
        }

    }

    public function customer_form_data_store(Request $request)
    {
        $request->validate([
             'xzR5hRwvY'=>'required|string|max:255|min:3',
             'NNJEvpDTlK'=>'required|string|max:255|min:3',
             'customer_name'=>'required|string|max:255|min:3',
             'customer_phone_number'=>'required|max:255|min:3|string'
         ]);

        $part = $request->except('_token');
        session(['session_first' =>$part]);

        if(session()->has('session_first')) {
            return redirect()->route('hotel_standard');
        } else {
            return view('app.link_generate.form_page');
        }
    }

    public function hotel_standard() {

        $customer_hotel = DB::table('customer_hotel')
            ->join('hotels', 'hotels.id', '=', 'customer_hotel.hotel_id')
            ->where('customer_id','=',session()->get('customer_id'))
            ->get();
        $questions = Question::where([
            ['question_category_id', '=', 3],
        ])->whereIn("unique_id",[
            "Zv2x4x6w54",
            "vfZWkBvin",
            "5CT3IcShn",
            "csdufRifW",
            "naxn4IjaP",
            "ddLbQ9UIF",
            "tidgy8P7u",
            "tkHqyoi0n",
            "RivzREI7t",
            "eu2QqeYfl",
            "vkOIIsM3O",

        ])->get();
        return view('app.link_generate.hotel_standard',compact('customer_hotel','questions'));
    }

    public function transport(Request $request) {
        $questions = Question::where([
            ['question_category_id', '=', 5],
        ])->whereIn('unique_id', [
            "nerihu256",
            "i8V0EbkNtG",
            "jhBd87327"
        ])->get();
        return view('app.link_generate.transport', compact('questions'));
    }

    public function driver_guide(Request $request) {
        $questions = Question::where([
            ['question_category_id', '=', 4],
        ])->whereIn('unique_Id', [
            "dfgY6785",
            "irHg4397",
            "geyU2344"
        ])->get();
        return view('app.link_generate.driver_guide', compact('questions'));
    }

    public function remaining_questions(Request $request) {
        $questions = Question::where([
            ['question_category_id', '=', 6],
        ])->whereIn('unique_Id', [
            "iusr8922"
        ])->get();
        return view('app.link_generate.remaining_questions', compact('questions'));
    }





    public function hotel_standard_store(Request $request)
    {
        $part = $request->except('_token');
        session(['session_second' =>$part]);
        foreach($request->expect('_token') as $key => $value) {
            session()->put($key, $value);
        }
        if(session()->has('session_first') && session()->has('session_second')) {

            $customer_hotel = DB::table('customer_hotel')
                ->join('hotels', 'hotels.id', '=', 'customer_hotel.hotel_id')
                ->where('customer_id','=',session()->get('customer_id'))
                ->get();

            return view('app.link_generate.about_guid');
        } elseif(!session()->has('session_second')) {

            return redirect()->route('customer_form_page');
        }
    }

    public function transport_store(Request $request)
    {
        $part = $request->except('_token');
        session(['session_second' =>$part]);

        foreach($request->expect('_token') as $key => $value) {
            session()->put($key, $value);
        }

        if(session()->has('session_first') && session()->has('session_second')) {


            return view('app.link_generate.about_guid');
        } elseif(!session()->has('session_second')) {

            return redirect()->route('hotel_standard');

        }
    }

    public function driver_guide_store(Request $request) {
        $part = $request->except('_token');

        session(['session_second' =>$part]);

        foreach($request->expect('_token') as $key => $value) {
            session()->put($key, $value);
        }

        if(session()->has('session_first') && session()->has('session_second')) {

            $customer_hotel = DB::table('customer_hotel')
                ->join('hotels', 'hotels.id', '=', 'customer_hotel.hotel_id')
                ->where('customer_id','=',session()->get('customer_id'))
                ->get();

            return view('app.link_generate.about_guid');
        } else if(!session()->has('session_second')) {

            return redirect()->route('remaining_questions');

        }
    }

}
