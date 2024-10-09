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

</head>
<body>


<div class="container">
    <div class="mt-5">

        <form action="add" id="feedbackForm" enctype="multipart/form-data" method="post">

            @csrf
            {{csrf_field()}}


           <h3>

           </h3>
            <div class="row">
            @foreach($questions1 as $question1)
                    <div class="col-md-6">
                        <div class="card mt-2 mb-2 shadow-sm p-2">
                            <p> <u> {{$question1->question1}}  <span class="text-dark">  </span>  </u>  </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{$question1->unique_id}}" type="radio" name="{{$question1->unique_id}}"  value="MCSSCK2024">
                                        <label class="form-check-label" for="exampleRadios_{{$question1->unique_id}}">
                                            Excellent 😆
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{$question1->unique_id}}" type="radio" name="{{$question1->unique_id}}"  value="CCRRUT2024">
                                        <label class="form-check-label" for="exampleRadios_{{$question1->unique_id}}">
                                            Good 🙂
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{$question1->unique_id}}" type="radio" name="{{$question1->unique_id}}"  value="SVHTTV2024">
                                        <label class="form-check-label" for="exampleRadios_{{$question1->unique_id}}">
                                            Satisfactory 😒
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input {{$question1->unique_id}}" type="radio" name="{{$question1->unique_id}}"  value="TRRSC2024">
                                        <label class="form-check-label" for="exampleRadios_{{$question1->unique_id}}">
                                            Unsatisfactory ☹️
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach


            @foreach($questions2 as $question2)
            <div class="col-md-6">
                <div class="card mt-2 mb-2 shadow-sm p-2">
                    <p> <u> {{$question2->question2}}  <span class="text-dark">  </span>  </u>  </p>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input {{$question2->unique_id}}" type="radio" name="{{$question2->unique_id}}"  value="OBLCH2024 ">
                                <label class="form-check-label" for="exampleRadios_{{$question2->unique_id}}">
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input {{$question2->unique_id}}" type="radio" name="{{$question2->unique_id}}"  value="zdYfCJ0Kq">
                                <label class="form-check-label" for="exampleRadios_{{$question2->unique_id}}">
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>



            <div class="col-md-12 mt-5">
                <button type="submit" class="btn btn-sm btn-primary float-right"> SUBMIT </button>
            </div>
        </form>
    </div>
</div>
<script src="{{asset('question/js/sweet-alert.min.js')}}">
</script>
<script src="{{asset('question/js/remaining_questions.js')}}">
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
