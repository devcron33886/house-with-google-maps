<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ trans('panel.site_title') }}</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Reggae+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body{
        background-color: rgb(240, 237, 240);
        font-family: 'PT Sans', sans-serif;
        }
        .navbar-brand{
        margin-left: 2.5rem;
        max-height: 15em;
        max-width:100%;
        font-family: 'Reggae One', cursive;
        font-weight: bold;
        font-size: 25px;
        }

        .navbar-nav{
            margin-left: 7em;
        }
        .nav-link{
            font-size: 18px;
            font-weight: 400;
            margin-left: 2em;

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">{{ trans('panel.site_title') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Houses</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('owners') }}" >Owners</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" >Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" >Blog</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ml-2">
                    <a href="{{ route('login') }}" class="nav-link">{{ trans('global.login') }}</a>
                </li>
                <li class="nav-item ml-2">
                    <a href="{{  route('register') }}" class="nav-link">{{ trans('global.register') }}</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container col-md-11 mt-2">
        {{-- owners Listing --}}
        <div class="text-black text-center">LIST OF OWNERS AND THEIR RATINGS</div>
        <div class="row justify-content-center pt-3 mt-3">

            @foreach ($owners as $owner)
                <div class="col-md-4">
                    <div class="card card-widget widget-user-2">
                        <div class="widget-user-header bg-warning">
                            <div class="widget-user-image">
                                @if($owner->profile_image)
                                    <img class="img-circle elevation-2" src="{{ $owner->profile_image->getUrl('preview') }}" alt="User Avatar">
                                @endif
                            </div>

                            <h3 class="widget-user-username">{{ $owner->name }}</h3>
                            <h5 class="widget-user-desc">@foreach($owner->roles as $key => $roles)
                                    {{ $roles->title }}</h5>@endforeach
                        </div>
                        <div class="card-footer p-0">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Contact <span class="float-right">{{ $owner->mobile }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Rates <span class="float-right badge bg-info">5</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Total post <span class="float-right badge bg-success">12</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Followers <span class="float-right badge bg-danger">842</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>


<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

