<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('question/css/bootstrap.min.css')}}" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("question/css/sweet-alert.css")}}">
    <title>NKAR TRAVEL</title>
    <style>
        .line_class{
            border-top: 3px dashed red;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="mt-5">
        <div style="display: flex; justify-content: space-between;">
            <h4 class="card-title mt-2 mb-2"> Overall Travel Experiences  </h4>
        </div>
        <form action="#" id="feedbackForm" enctype="multipart/form-data" method="post">
            @csrf
            {{csrf_field()}}
            <div class="row">
                @foreach($question_type_first as $key => $question)
                    <div class="col-md-6">
                        <div class="card mt-2 mb-2 shadow-sm p-2">
                            <p><u>{{$question->question}}</u></p>
                            <div>
                                <span id="error_{{$key+1}}"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="MCSSCK2024">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            Excellent 😆
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="CCRRUT2024">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            Good 🙂
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="SVHTTV2024">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            Satisfactory 😒
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="TRRSC2024">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            Unsatisfactory ☹️
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach($question_type_second as $key => $question)<div class="col-md-6">
                        <div class="card mt-2 mb-2 shadow-sm p-2">
                            <p><u>{{$question->question}}</u></p>
                            <div>
                                <span id="error_{{$key+2}}"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="OBLCH2024">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            YES
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="zdYfCJ0Kq">
                                        <label class="form-check-label" for="buttonRadios_{{$question->unique_id}}">
                                            NO
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-12 mt-5">
                <button  class="btn btn-sm btn-primary float-right"> NEXT </button>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('question/js/sweet-alert.min.js')}}">
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script>
    document.getElementById('feedbackForm').onsubmit = function(event) {
        /*xsbOONhU2B*/
        const radiosGroup_guid_1YJTWRUBG = document.querySelectorAll('.guid_1YJTWRUBG');
        const isGroup1Checked_guid_1YJTWRUBG = Array.from(radiosGroup_guid_1YJTWRUBG).some(radio => radio.checked);
        if (!isGroup1Checked_guid_1YJTWRUBG) {
            swal("Please select an option !", "1) How do you rate your overall holiday?")
            error_1.textContent = "Please select an option"
            error_1.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*---------------------------------------------------------------------------*/
        /*WMlmmJGIO*/
        const radiosGroup_guid_WMlmmJGIO = document.querySelectorAll('.guid_WMlmmJGIO');
        const isGroup1Checked_guid_WMlmmJGIO = Array.from(radiosGroup_guid_WMlmmJGIO).some(radio => radio.checked);
        if (!isGroup1Checked_guid_WMlmmJGIO) {
            swal("Please select an option !", "2) Would you recommend the destination to your family / friends ?")
            error_2.textContent = "Please select an option"
            error_2.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*---------------------------------------------------------------------------*/
        /*Dbois0KMo*/
        const radiosGroup_guid_Dbois0KMo = document.querySelectorAll('.guid_Dbois0KMo');
        const isGroup1Checked_guid_Dbois0KMo = Array.from(radiosGroup_guid_Dbois0KMo).some(radio => radio.checked);
        if (!isGroup1Checked_guid_Dbois0KMo) {
            swal("Please select an option !", "3) if so, would you recommend the services of NKAR TRAVELS &amp; TOURS ?")
            error_3.textContent = "Please select an option"
            error_3.style.color = "red"
            event.preventDefault();
            return false;
        }
        return true;
    };
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>












