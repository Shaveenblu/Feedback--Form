
FeedBackForm


question_id
customer_id
response_id
hotel_id(nullable)
guid_id(nullable)
tour_id(nullable)
customer_name(nullable)
customer_tel_phone_number(nullable)
date(nullable)

```php

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

```






























