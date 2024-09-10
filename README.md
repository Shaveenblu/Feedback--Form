Tours(TABLE)

unique_id(string)
tour_operator(string)
tour_name(string)
tour_start_date(date)
tour_no(string)

-------------------------------

Guide(TABLE)

guid_first_name
guid_last_name
unique_id

----------------------------------

guid_tour

guid_id
tour_id

------------------------------------

---------------------------

Hotel(TABLE)

hotel_name(string)
hotel_place(string)
unique_id(string)


--------------------------

Customer(TABLE)

customer_name(string)
customer_phone_number(string)
tour_no(string)
unique_id(string)

------------------------------
customer_hotel(TABLE)

customer_id
hotel_id

-------------------------

QuestionCategory(TABLE)

name(string)
unique_id(string)

-----------------------

ResponseType(TABLE)

name
unique_id

-------------------------

Questions(TABLE)

question(string)
category_id
unique_id(string)

--------------------------

CustomerInquiry(TABLE)

customer_id
question_id
response_type_id


--------------------------





















































