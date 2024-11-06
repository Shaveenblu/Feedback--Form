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
        <form action="{{route('form-guid.answer-store')}}" id="feedbackForm" enctype="multipart/form-data" method="post">
            @csrf
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Select Your Guid Name</label>
                <select class="form-select form-control" name="guid_id" aria-label="Default select example">
                    <option selected disabled value="">Open this select menu</option>
                    @foreach($tour_guid as $key =>$guid)
                    <option value="{{$guid->id}}">{{$guid->guid_first_name}} {{$guid->guid_last_name}}</option>
                    @endforeach
                </select>
            </div>
                <div class="row">
                    @foreach($questions as $question)
                        <div class="col-md-6">
                            <div class="card mt-2 mb-2 shadow-sm p-2">
                                <p> <u> {{$question->question}}   </u>  </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="MCSSCK2024">
                                            <label class="form-check-label" for="exampleRadios_{{$question->unique_id}}">
                                                Excellent 😆
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="CCRRUT2024">
                                            <label class="form-check-label" for="exampleRadios_{{$question->unique_id}}">
                                                Good 🙂
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="SVHTTV2024">
                                            <label class="form-check-label" for="exampleRadios_{{$question->unique_id}}">
                                                Satisfactory 😒
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input {{'guid_'.$question->unique_id}}" type="radio" name="{{$question->unique_id}}"  value="TRRSC2024">
                                            <label class="form-check-label" for="exampleRadios_{{$question->unique_id}}">
                                                Unsatisfactory ☹️
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

        console.log('done win windows ldekkdksdksdksdfjsdfi');

        //return false;

        const radiosGroup_guid_xsbOONhU2B = document.querySelectorAll('.guid_xsbOONhU2B');
        const isGroup1Checked_guid_xsbOONhU2B = Array.from(radiosGroup_guid_xsbOONhU2B).some(radio => radio.checked);
        if (!isGroup1Checked_guid_xsbOONhU2B) {
            swal("Please select an option !", "1) Language ?")
            error_1.textContent = "Please select an option"
            error_1.style.color = "red"
            event.preventDefault();  // Prevent form submission
            return false;
        }
        If both groups are valid, allow the form to submit
        return true;


    };
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>




