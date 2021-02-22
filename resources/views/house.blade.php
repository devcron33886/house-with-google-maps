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
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
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
        #footer{
        border-radius: 0px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
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

    <div class="row mt-4">
        <div class="col-12 col-sm-6">
            <div class="col-12">
                @if($house->cover_photo)
                    <img src="{{ $house->cover_photo->getUrl('preview') }}" class="product-image" alt="Product Image">
                @endif
            </div>
            <div class="col-12 product-image-thumbs">
                @foreach($house->photos as $key => $media)
                <div class="product-image-thumb">
                    <img src="{{ $media->getUrl('preview') }}" alt="Product Image">
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-12 col-sm-6">
            <div class="card card-widget widget-user-2 mt-2">
                <div class="card-header"><h5 class="text-center">HOUSE DETAILS</h5></div>
                <div class="card-body">
                    <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Price</b> <a class="float-right">{{ $house->price }}
                            @if ($house->currency==0)
                                RWF
                            @else
                                USD
                            @endif
                        </a>
                    </li>
                  <li class="list-group-item">
                    <b>Number of rooms</b> <a class="float-right">{{ $house->bedrooms }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Number of Bathrooms</b> <a class="float-right">{{ $house->bathrooms }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Number of Floors</b> <a class="float-right">{{ $house->floors }}</a>
                  </li>
                </ul>
                </div>
            </div>

            <div class="card card-outline card-info">
                <div class="card-header"><h4>REQUEST HOUSE</h4></div>
                <div class="card-body">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" class="form-control" name="house_id" value="{{ $house->id }}">
                    <div class="form-group">
                        <label for="names">Enter your names</label>
                        <input type="text" name="names" class="form-control @error('name') is-invalid @enderror" value="{{ old('names') }}" placeholder="Ex: John Smith">
                        @error('names')
                            <span class="invalid-feedback">
                                {{  $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Ex:john@mail.com">
                        <span class="invalid-feedba">
                        @error('email')
                            {{ $message }}
                        @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="mobile">Mobile</label>
                        <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Ex: +250 xxx xxx xxx">
                    </div>
                    <hr>
                    <button class="btn btn-primary btn-flat float-lg-right" type="submit"><i class="fas fa-save"></i> Send</button>
                </form>
                </div>
            </div>

        </div>
    </div>
    <div class="row mt-4">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Infrastructures</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> {{ $house->description }} </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
            @if ($house->infrastructure)
                {{  $house->infrastructure->name }}
            @endif
                </div>
            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"></div>
        </div>
    </div>
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
    <hr>
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






<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function () {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>
<script type='text/javascript' src='https://maps.google.com/maps/api/js?language=en&key={{ env('AIzaSyAlOfG5EOEIR_YSUy832_nnN5KsTgP0QMc') }}&libraries=places&region=GB'></script>
</body>
</html>


