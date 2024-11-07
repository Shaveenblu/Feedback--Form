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
            <h4 class="card-title mt-2 mb-2">DRIVER GUID</h4>
        </div>
        <form action="{{route('form-guid.answer-store')}}" id="feedbackForm" enctype="multipart/form-data" method="post">
            @csrf
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Select Your Guid Name</label>
                <select class="form-select form-control" name="guid_id" aria-label="Default select example" required>
                    <option selected disabled value="">Open this select menu</option>
                    @foreach($tour_guid as $key =>$guid)
                    <option value="{{$guid->id}}">{{$guid->guid_first_name}} {{$guid->guid_last_name}}</option>
                    @endforeach
                </select>
            </div>
                <div class="row">
                    @foreach($questions as $key => $question)
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
        /*xsbOONhU2B*/
        const radiosGroup_guid_xsbOONhU2B = document.querySelectorAll('.guid_xsbOONhU2B');
        const isGroup1Checked_guid_xsbOONhU2B = Array.from(radiosGroup_guid_xsbOONhU2B).some(radio => radio.checked);
        if (!isGroup1Checked_guid_xsbOONhU2B) {
            swal("Please select an option !", "1) Language ?")
            error_1.textContent = "Please select an option"
            error_1.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*8qpgJL35A*/
        const radiosGroup_guid_8qpgJL35A = document.querySelectorAll('.guid_8qpgJL35A');
        const isGroup1Checked_guid_8qpgJL35A = Array.from(radiosGroup_guid_8qpgJL35A).some(radio => radio.checked);
        if (!isGroup1Checked_guid_8qpgJL35A) {
            swal("Please select an option !", "2) Knowledge of country and sites")
            error_2.textContent = "Please select an option"
            error_2.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*6sYFvXNzK*/
        const radiosGroup_guid_6sYFvXNzK = document.querySelectorAll('.guid_6sYFvXNzK');
        const isGroup1Checked_guid_6sYFvXNzK = Array.from(radiosGroup_guid_6sYFvXNzK).some(radio => radio.checked);
        if (!isGroup1Checked_guid_6sYFvXNzK) {
            swal("Please select an option !", "3) Knowledge of other areas")
            error_3.textContent = "Please select an option"
            error_3.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*ly1XffocJ*/
        const radiosGroup_guid_ly1XffocJ = document.querySelectorAll('.guid_ly1XffocJ');
        const isGroup1Checked_guid_ly1XffocJ = Array.from(radiosGroup_guid_ly1XffocJ).some(radio => radio.checked);
        if (!isGroup1Checked_guid_ly1XffocJ) {
            swal("Please select an option !", "4) Courtesy and friendliness")
            error_4.textContent = "Please select an option"
            error_4.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*u7W0aYo6e*/
        const radiosGroup_guid_u7W0aYo6e = document.querySelectorAll('.guid_u7W0aYo6e');
        const isGroup1Checked_guid_u7W0aYo6e = Array.from(radiosGroup_guid_u7W0aYo6e).some(radio => radio.checked);
        if (!isGroup1Checked_guid_u7W0aYo6e) {
            swal("Please select an option !", "5) Punctuality")
            error_5.textContent = "Please select an option"
            error_5.style.color = "red"
            event.preventDefault();
            return false;
        }
        /*AI9X5Mcl6*/
        const radiosGroup_guid_AI9X5Mcl6 = document.querySelectorAll('.guid_AI9X5Mcl6');
        const isGroup1Checked_guid_AI9X5Mcl6 = Array.from(radiosGroup_guid_AI9X5Mcl6).some(radio => radio.checked);
        if (!isGroup1Checked_guid_AI9X5Mcl6) {
            swal("Please select an option !", "5) Punctuality")
            error_6.textContent = "Please select an option"
            error_6.style.color = "red"
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




