<!DOCTYPE html>
<html>
    <head>
        <title>LaraCars 2.0</title>
        <link rel="stylesheet" href="{!! URL::asset('assets/css/foundation.css'); !!}">
        <link rel="stylesheet" href="{!! URL::asset('assets/foundation-icons/foundation-icons.css'); !!}">
        <link rel="stylesheet" href="{!! URL::asset('assets/css/app.css'); !!}">
        <link rel="stylesheet" href="{!! URL::asset('assets/js/slick/slick.css'); !!}">
        <link rel="stylesheet" href="{!! URL::asset('assets/js/slick/slick-theme.css'); !!}">
    </head>
    <body>
    <div>

        <!-- Begin Navigation -->
        <nav class="top-bar" data-topbar role="navigation">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="menu-text show-for-large">LaraCars Vehicle Management System</li>
                    <li>
                        <a href="/">Home</a>
                        <!-- <ul class="menu vertical">
                            <li><a href="#">One</a></li>
                            <li><a href="#">Two</a></li>
                            <li><a href="#">Three</a></li>
                        </ul> -->
                    </li>
                    <li><a href="/dealers">Dealers</a></li>
                    <li><a href="/vehicles">Vehicles</a></li>
                    <li><a href="/profiles">Profiles</a></li>

                </ul>
            </div>
            <div class="top-bar-right">
               <!--  <ul class="menu">
                    <li><input type="search" placeholder="Search"></li>
                    <li><button type="button" class="button">Search</button></li>
                </ul>
                -->
                <ul class="dropdown menu hide-for-small-only" data-dropdown-menu>
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login <i class="fi-arrow-right"></i> </a></li>
                    <li><a href="{{ url('/register') }}">Register <i class="fi-pencil"></i></a></li>
                @else
                    <li><a href="#">
                            <i class="fi-torso"></i>    {{ Auth::user()->name }} <!-- {{ Auth::user()->id }} -->
                        </a>
                        <ul class="menu vertical">
                            <li><a href="{{ url('/logout') }}"><i class="fi-eject"></i> Logout </a></li>
                            <li><a href="{{ url('/myvehicles') }}"><i class="fi-list"></i> My Vehicles </a></li>
                        </ul>
                    </li>
                @endif
                </ul>
            </div>
        </nav>
        <!-- End Navigation -->

        <div class="large-12 columns">
        @yield('content')
        @yield('column-a')
        </div>
        <p class="show-for-small-only">small view</p>
        <p class="show-for-medium-only">medium view</p>
        <p class="show-for-large-only">large view</p>
        <div class="footerpush"></div>
        <footer class="footer">
            <p class="row show-for-medium-up">Copyright &copy{!! date('Y'); !!}</p>
            <div class="row show-for-small-only">
                <div class="icon-bar-push">
                    <div class="icon-bar five-up footer-fixed">
                        <a class="item">
                            <i class="fi-home" ></i>
                            <label>Home</label>
                        </a>
                        <a class="item">
                            <i class="fi-bookmark"></i>
                            <label>Bookmark</label>
                        </a>
                        <a class="item">
                            <i class="fi-info" ></i>
                            <label>Info</label>
                        </a>

                        @if (Auth::guest())
                        <a class="item" href="{{ url('/login') }}">
                            <i class="fi-arrow-right" ></i>
                            <label>Login</label>
                        </a>
                        <a class="item" href="{{ url('/register') }}">
                            <i class="fi-pencil" ></i>
                            <label>Register</label></a>
                        @else
                        <a class="item" href="#">
                            <i class="fi-torso"></i>
                            <label for="">{{ explode(" ", Auth::user()->name)[0] }} <!-- {{ Auth::user()->id }} --></label>

                        </a>
                        <a class="item" href="{{ url('/logout') }}">
                            <i class="fi-eject" ></i>
                            <label for="Logout">Logout</label>
                        </a>

                        @endif

                    </div>

                </div>
            </div>
        </footer>
        <script src="{!! URL::asset('assets/js/vendor/jquery.min.js') !!}"></script>

        <script src="{!! URL::asset('assets/js/foundation.js') !!}"></script>
        <script src="{!! URL::asset('assets/js/foundation.js') !!}"></script>
        <script src="{!! URL::asset('assets/js/vendor/what-input.min.js') !!}"></script>
        <script src="{!! URL::asset('assets/js/slick/slick.js') !!}"></script>



        <script type="text/javascript">
            $(document).foundation();


            $(document).ready(function(){
                $(".imageGallery").slick({
                    autoplay:true,
                    arrows:true
                });

            });
            $(window).load(function(){
            });
            $('.addImage').click(function(){
                cloneImageField();
            });
            function cloneImageField() {
                var imgContainer = $('#image-field').clone();
                imgContainer.appendTo('.image-fields');
            }



                $('.deleteImageConfirm').click(function (e) {
                    e.preventDefault();
                    var container = $(this).parent('div');
                    $.ajax({
                                url: $(this).data('url'),
                                cache: false
                            })
                            .done(function (html) {

                                if (html == '1') {
                                    container.hide();
                                }
                            });
                });
            $('.deleteImage').click(function (e) {
                e.preventDefault();
                $(this).parent().find('.deleteImageConfirm').toggleClass('hide');
            });
            $('#decode').click(function(){
                var vin = $("#vin").val();



                $.getJSON( "/decodeVin/"+vin, function( data ) {
                    var comments = '';

                    $.each( data, function( key, val ) {
                        //console.log( key + ">" + val  );
                        //console.log(val['year']);
                    });
                    comments += 'Trim: ' + data['years'][0]['styles'][0]['name']+' ' +  '' + '\r';
                    comments += 'Market: ' + data['categories']['market']+' ' +  'vehicle' + '\r';
                    comments += 'Class: ' + data['categories']['EPAClass']+ ' ' +  '\r';
                    comments += 'Body Style: ' + data['categories']['vehicleStyle'] +' ' +  '\r';
                    comments += 'Drive: ' + data['drivenWheels']+'\r';
                    comments += 'Door Count: ' + data['numOfDoors']+'\r';
                    comments += 'MPG: ' + data['MPG']['city'] +'/CITY ' + data['MPG']['highway']+'/HGWY '+ '\r';

                    if(typeof(data['engine'])!= 'undefined') {

                        $.each(data['engine'], function(index, value) {
                            if( (index != 'id') && (index != 'name') && (index != 'rpm') && (index != 'valve')  ) {
                                comments += index + ': ' + value + '\r';
                            }

                        });
                    }
                    $('#make').val(data['make']['name']);
                    $('#model').val(data['model']['name']);
                    $('#year').val(data['years'][0]['year']);
                    $('#price').val(data['price']['usedTmvRetail']);
                    $('#comments').val(comments);

                });});
        </script>

    </body>
</html>
