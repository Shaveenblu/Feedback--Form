<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>NKAR TRAVEL</title>
</head>
<body>


<div class="container">
    <div class="mt-5">
        @foreach($customer_hotel as $hotel)
           <h3>
              <strong>
                   {{$hotel->hotel_name}} Hotel
              </strong>
           </h3>
            @foreach($questions as $question)
                <div class="card p-5">
                    <p>   {{$question->question}} | <span class="text-dark"> <strong> {{$hotel->hotel_name}} </strong> </span> </p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="xzR5hRwvY" id="exampleRadios1" value="MCSSCK2024">
                                <label class="form-check-label" for="exampleRadios1">
                                    Excellent 😆
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="xzR5hRwvY" id="exampleRadios1" value="CCRRUT2024">
                                <label class="form-check-label" for="exampleRadios1">
                                    Good 🙂
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="xzR5hRwvY" id="exampleRadios1" value="SVHTTV2024">
                                <label class="form-check-label" for="exampleRadios1">
                                    Satisfactory 😒
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="xzR5hRwvY" id="exampleRadios1" value="TRRSC2024">
                                <label class="form-check-label" for="exampleRadios1">
                                    Unsatisfactory ☹️
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>


<br>
<br>
<br>
<br>
<br>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
