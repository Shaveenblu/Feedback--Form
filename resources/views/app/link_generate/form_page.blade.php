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
        <form action="{{route('customer_form_data_store')}}" enctype="multipart/form-data" method="post">
            @csrf
            {{csrf_field()}}
            <div class="card p-5">
                <div class="mb-3">
                    <label for="customerName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="customerName" name="customer_name">
                </div>
                <div class="mb-3">
                    <label for="customerTelPhone" class="form-label">Telephone Number</label>
                    <input type="text" class="form-control" id="customerTelPhone" maxlength="13" name="customer_phone_number">
                    <div  class="form-text">We'll never share your phone <number></number> with anyone else.</div>
                </div>
            </div>
            <div class="card p-5">
                <p>1) Reception by the representative of nkar travels and tours</p>
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
            <div class="card p-5">
                <p>2) Services of NKAR Travels and Tours During Your Stay </p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="NNJEvpDTlK" id="exampleRadios1" value="MCSSCK2024">
                            <label class="form-check-label" for="exampleRadios1">
                                Excellent 😆
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="NNJEvpDTlK" id="exampleRadios1" value="CCRRUT2024">
                            <label class="form-check-label" for="exampleRadios1">
                                Good 🙂
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="NNJEvpDTlK" id="exampleRadios1" value="SVHTTV2024">
                            <label class="form-check-label" for="exampleRadios1">
                                Satisfactory 😒
                            </label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="NNJEvpDTlK" id="exampleRadios1" value="TRRSC2024">
                            <label class="form-check-label" for="exampleRadios1">
                                Unsatisfactory ☹️
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <button type="submit" class="btn btn-sm btn-primary float-right"> NEXT </button>
            </div>
        </form>
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
