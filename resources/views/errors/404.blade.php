<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404-ERROR</title>
    <link rel="shortcut icon" href="{{asset('front/dpassets/img/favicon.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('front/dpassets/css/style.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.2.0/css/all.css">
</head>

<body>
    <div class="error container-fluid bg-white ">
        <div class="col-md-8 m-auto bg-light pt-5 pb-5 all-center ">
            <div class="errorHeading mb-5 clr-primry">404</div>
            <h3 class="font-weight-light mb-4">Ooops!!</h3>
            <h5 class="font-weight-light errorh5">THAT PAGE DOESN’T EXIST OR IS UNAVAILABLE</h5>
            <a class="btn pl-5 pr-5 pt-3 pb-3 mt-5 mb-5 text-white btn-primary rounded-0" href="{{App::make('url')->to('/')}}"> Go Back to Home </a>
        </div>
    </div>
</body>

</html>