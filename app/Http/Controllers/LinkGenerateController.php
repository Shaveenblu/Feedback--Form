<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerFormUrl;
use App\Models\FeedBackForm;
use App\Models\Hotel;
use App\Models\Question;
use App\Models\ResponseType;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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


    public function customer_form_page($unique_id){
        $customer_form_url = CustomerFormUrl::where('unique_id',$unique_id)->first();
        if($customer_form_url){
            session(['customer_id' => $customer_form_url->customer_id]);
            session(['customer_form_urls_unique_id' => $customer_form_url->unique_id]);
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
        if(session()->has('session_form_first_step') && session()->has('customer_id') && session()->has('customer_form_urls_unique_id')){
            return redirect()->route('hotel_standard');
        }else{
            return view('app.link_generate.form_page');
        }
    }

    public function hotel_standard(){
        if(session()->has('customer_form_urls_unique_id') && session()->has('customer_id') && session()->has('session_form_first_step') && !session()->has('session_hotel_standard')){
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
                "AI9X5Mcl6",
            ])->get();

         return view('app.link_generate.about_guid', compact('tour_guid','questions'));
        }elseif(!session()->has('session_form_first_step') && !session()->has('customer_id')){
            return redirect()->route('customer_form_page');
        }
    }

    public function form_guid_answer_store(Request $request){
        $part = $request->except('_token');
        session(['session_about_guid' =>$part]);
        $questions = Question::where([
            ['question_category_id', '=', 5],
        ])->whereIn("unique_id",[
            "i8V0EbkNtG",
            "6snmnEeAw",
            "ltxAddrNJ",
        ])->get();
        return view('app.link_generate.transport', compact('questions'));
    }
    public function form_transport_answer_store(Request $request)
    {
        $part = $request->except('_token');
        session(['session_transport_guid' =>$part]);

        $question_type_first = Question::where([
            ['question_category_id', '=', 6],
        ])->whereIn("unique_id",[
            "1YJTWRUBG",
        ])->get();

        $question_type_second = Question::where([
            ['question_category_id', '=', 6],
        ])->whereIn("unique_id",[
            "WMlmmJGIO",
            "Dbois0KMo",
        ])->get();

        return view('app.link_generate.extra_questions', compact('question_type_first','question_type_second'));
    }

    public function extra_question_answer_store(Request $request)
    {
        $request->validate([
            '1YJTWRUBG' => 'required|string',
            'WMlmmJGIO' => 'required|string',
            'Dbois0KMo' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $part = $request->except('_token', 'comment');
        session(['session_extra_question' => $part]);
        $customer_form_url = CustomerFormUrl::where('unique_id', session()->get('customer_form_urls_unique_id'))->first();
        $customer = Customer::find($customer_form_url->customer_id);
        $currentDate = Carbon::now()->toDateString();

        if (
            session()->has('session_form_first_step')
            && session()->has('customer_id')
            && session()->has('customer_form_urls_unique_id')
            && session()->has('session_hotel_standard')
            && session()->has('session_transport_guid')
            && session()->has('session_extra_question')
            && session()->has('session_about_guid')
        ) {

            /*-----------------------------------------*/
            /*session_form_first_step*/
            if (session()->has('session_form_first_step')) {
                foreach (session()->get('session_form_first_step') as $key => $part) {
                    if ($key != 'customer_name' and $key != 'customer_phone_number') {
                        $question = DB::table('questions')->where('unique_id', $key)->first();
                        $response_type = DB::table('response_types')->where('unique_id', $part)->first();
                        DB::table('feed_back_forms')->insert(
                            [
                                'question_id' => $question->id,
                                'customer_form_urls_unique_id' => session()->get('customer_form_urls_unique_id'),
                                'customer_id' => $customer->id,
                                'response_type_id' => $response_type->id,
                                'hotel_id' => null,
                                'guide_id' => null,
                                'tour_id' => $customer_form_url->tour_id,
                                'customer_name' => session()->get('session_form_first_step')['customer_name'],
                                'customer_tel_phone_number' => session()->get('session_form_first_step')['customer_phone_number'],
                                'date' => $currentDate,
                            ]
                        );
                    }
                }
            }
            /*-------------------------------------------*/
            /*session_hotel_standard*/
            if (session()->has('session_hotel_standard')) {
                foreach (session()->get('session_hotel_standard') as $key => $part) {
                    [$session, $hotelCode] = explode('_', $key, 2);
                    $question = DB::table('questions')->where('unique_id', $hotelCode)->first();
                    $response_type = DB::table('response_types')->where('unique_id', $part)->first();
                    $hotelS = DB::table('hotels')->where('unique_id',$session)->first();
                    DB::table('feed_back_forms')->insert(
                        [
                            'question_id' => $question->id,
                            'customer_form_urls_unique_id' => session()->get('customer_form_urls_unique_id'),
                            'customer_id' => $customer->id,
                            'response_type_id' => $response_type->id,
                            'hotel_id' => $hotelS->id,
                            'guide_id' => null,
                            'tour_id' => $customer_form_url->tour_id,
                            'customer_name' => session()->get('session_form_first_step')['customer_name'],
                            'customer_tel_phone_number' => session()->get('session_form_first_step')['customer_phone_number'],
                            'date' => $currentDate,
                        ]
                    );
                }
            }
            /*---------------------------------------------*/
            /*session_transport_guid*/
            if (session()->has('session_transport_guid')) {
                foreach (session()->get('session_transport_guid') as $key => $part) {
                    $question = DB::table('questions')->where('unique_id', $key)->first();
                    $response_type = DB::table('response_types')->where('unique_id', $part)->first();
                    DB::table('feed_back_forms')->insert(
                        [
                            'question_id' => $question->id,
                            'customer_form_urls_unique_id' => session()->get('customer_form_urls_unique_id'),
                            'customer_id' => $customer->id,
                            'response_type_id' => $response_type->id,
                            'hotel_id' => null,
                            'guide_id' => null,
                            'tour_id' => $customer_form_url->tour_id,
                            'customer_name' => session()->get('session_form_first_step')['customer_name'],
                            'customer_tel_phone_number' => session()->get('session_form_first_step')['customer_phone_number'],
                            'date' => $currentDate,
                        ]
                    );
                }
            }

            /*------------------------------------------*/
            /*session_about_guid*/
            if (session()->has('session_about_guid')) {
                foreach(session()->get('session_about_guid') as $key => $part) {
                    if($key != 'guid_id'){
                        $question = DB::table('questions')->where('unique_id', $key)->first();
                        $response_type = DB::table('response_types')->where('unique_id', $part)->first();
                        DB::table('feed_back_forms')->insert(
                            [
                                'question_id' => $question->id,
                                'customer_form_urls_unique_id' => session()->get('customer_form_urls_unique_id'),
                                'customer_id' => $customer->id,
                                'response_type_id' => $response_type->id,
                                'hotel_id' => null,
                                'guide_id' => session()->get('session_about_guid')['guid_id'],
                                'tour_id' => $customer_form_url->tour_id,
                                'customer_name' => session()->get('session_form_first_step')['customer_name'],
                                'customer_tel_phone_number' => session()->get('session_form_first_step')['customer_phone_number'],
                                'date' => $currentDate,
                            ]
                        );
                    }
                }
            }

            /*--------------------------------------------*/
            /*session_extra_question*/
            if (session()->has('session_extra_question')) {
                foreach(session()->get('session_extra_question') as $key => $part) {
                    $question = DB::table('questions')->where('unique_id', $key)->first();
                    $response_type = DB::table('response_types')->where('unique_id', $part)->first();
                    if($key != 'comment'){
                        DB::table('feed_back_forms')->insert(
                            [
                                'question_id' => $question->id,
                                'customer_form_urls_unique_id' => session()->get('customer_form_urls_unique_id'),
                                'customer_id' => $customer->id,
                                'response_type_id' => $response_type->id,
                                'hotel_id' => null,
                                'guide_id' => null,
                                'tour_id' => $customer_form_url->tour_id,
                                'customer_name' => session()->get('session_form_first_step')['customer_name'],
                                'customer_tel_phone_number' => session()->get('session_form_first_step')['customer_phone_number'],
                                'date' => $currentDate,
                            ]
                        );
                    }
                }
            }

            DB::table('customer_comments')->insert(
                [
                    'customer_form_urls_id' => $customer_form_url->id,
                    'comment' => $request->comment,
                    'unique_id' => Str::random(9),
                ]
            );

            return 'done!!!';

        }

    }

}
