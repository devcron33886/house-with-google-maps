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
            font-weight: 600;
            margin-left: 2em;
            color: aquamarine;
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
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Houses</a>
                </li>
                <li class="nav-item">
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
    <div class="container col-lg-11 mt-2 bg-light">
        <div class="row justify-content-center">
            <div class="col-md-12 form-inline mt-5">
                <select class="form-control col-4" style="border-radius: 0px;">
                    <option selected>--Choose Category ---</option>
                    @foreach($categories as $category)
                        <option>{{ $category->name }}</option>
                    @endforeach
                </select>
                <input class="form-control col-4 ml-2" placeholder="Ex: NYARUGENGE MUHIMA" style="border-radius: 0px;"><button class="btn btn-flat btn-primary ml-2"><i class="fas fa-search"></i> Search</button>
            </div>
        </div>
        <div class="row mt-4 pt-4">
            @forelse ($houses as $house)
                <div class="col-md-3">
                    <div class="card" style="border-radius: 0em; box-shadow: #0E1112; ">
                        @if($house->cover_photo)
                            <a href="/house/{{  $house->id }}">
                                <img class="card-img-top" src="{{ $house->cover_photo->getUrl('preview') }}" alt="House_picture" style="border-radius: 0px; border-color: #ffffff;">
                            </a>
                        @endif
                         <div class="card-body">
                             <div class="row">
                                 <h4 class="card-title text-center">{{ $house->title }}</h4>
                             </div>
                             <div class="row justify-content-between">
                                    <div class="col-4"
                                        {{ $house->bedrooms }} <i class="fas fa-bed"></i>
                                    </div>
                                    <div class="col-sm-4">
                                        {{ $house->bathrooms }} <i class="fas fa-shower"></i>
                                    </div>
                                     <div class="col-sm-4">
                                          {{ $house->floors }} <i class="fas fa-laptop-house"></i>
                                     </div>
                             </div>
                         </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-warning">
                    <h3 class="text-center"> No data available</h3>
                </div>
            @endforelse
        </div>
    </div>
        <div class="container col-lg-11 jumbotron" id="footer">
    <h6 class="text-center display-4">Subscribe</h6>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form action="" method="POST">
                @csrf
                <div class="input-group">
                    <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Type your email">
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-lg btn-default">
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
            <p class="pt-3"> Please subscibe for latest updates and free tips of how to get the property you need</p>
        </div>
    </div>

    <div class="row mt-5 pt-5">
        <div class="col-4">
            <h4 class="text-center">About Us</h4>
                <p class="text-center text-bold">This is the apllication that helps you to get the best property in the right area without passing through the commisioners.</p>
        </div>
        <div class="col-4">
            <h4 class="text-center">Contact</h4>
        </div>
        <div class="col-4">
            <h4 class="text-center">Follow</h4>
        </div>
    </div>
</div>

    <script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('AIzaSyAlOfG5EOEIR_YSUy832_nnN5KsTgP0QMc') }}&libraries=places&region=GB'></script>
</body>
</html>


