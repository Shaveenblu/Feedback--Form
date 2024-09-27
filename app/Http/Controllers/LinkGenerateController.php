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

        if(session()->has('session_first')){
            return redirect()->route('hotel_standard');
        }else{
            return view('app.link_generate.form_page');
        }
    }

    public function hotel_standard(){

        $customer_hotel=DB::table('customer_hotel')
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

    public function hotel_standard_store(Request $request)
    {

        foreach ($request->except('_token') as $key => $value) {
            // Split the key to get the hotel ID and question ID
            list($hotelId, $questionId) = explode('_', $key);

            // The value is the selected rating (e.g., "CCRRUT2024")
            $rating = $value;

            // Now you can process each part as needed
            // For example, you might save each response to a database
            // Example:
            $hotel = Hotel::where('unique_id',$hotelId)->first();
            $response = ResponseType::where('unique_id',$rating)->first();
            $question = Question::where('unique_id',$questionId)->first();


            FeedBackForm::create([
                 'question_id' => $question->id,
                 'customer_id' => 5,
                 'response_type_id' => $response->id,
                 'hotel_id' => $hotel->id,
             ]);
        }

        return 'done';

    }

}
