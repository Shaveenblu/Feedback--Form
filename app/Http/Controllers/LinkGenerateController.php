<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerFormUrl;
use App\Models\FeedBackForm;
use App\Models\Hotel;
use App\Models\Question;
use App\Models\ResponseType;
use App\Models\Tour;
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
            if(session()->has('session_form_first_step')){
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
        session(['session_form_first_step' =>$part]);
        if(session()->has('session_form_first_step')){
            return redirect()->route('hotel_standard');
        }else{
            return view('app.link_generate.form_page');
        }
    }

    public function hotel_standard(){
        if(session()->has('customer_id') && session()->has('session_form_first_step') && !session()->has('session_hotel_standard')){
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
        }else{
            return redirect()->back();
        }
        return view('app.link_generate.hotel_standard',compact('customer_hotel','questions'));
    }

    public function hotel_standard_store(Request $request)
    {
        $session_hotel_standard = $request->except('_token');
        session(['session_hotel_standard' =>$session_hotel_standard]);

        if(session()->has('session_form_first_step') && session()->has('session_hotel_standard') && session()->has('customer_id')){
        // return 'when it is dark enough!!!';
        //return 'hello world';
        $customer = Customer::find(session()->get('customer_id'));
        $tour_no = $customer->tour_no;
        $tour = Tour::where('tour_no','=',$tour_no)->first();

        //return $tour;
        $tour_guid = DB::table('guide_tour')
            ->join('guides', 'guides.id', '=', 'guide_tour.guide_id')
            ->where('tour_id','=',$tour->id)
            ->get();

            $questions = Question::where([
                ['question_category_id', '=', 4],
            ])->whereIn("unique_id",[
                "xsbOONhU2B",
                "8qpgJL35A",
                "6sYFvXNzK",
                "ly1XffocJ",
                "u7W0aYo6e",
            ])->get();

         return view('app.link_generate.about_guid', compact('tour_guid','questions'));
        }elseif(!session()->has('session_form_first_step') && !session()->has('customer_id')){
            return redirect()->route('customer_form_page');
        }
    }

    public function form_guid_answer_store(Request $request){

       // dd($request);
        $part = $request->except('_token');
        session(['session_about_guid' =>$part]);

        // guid select dropdown


        return 'done';

    }

}
