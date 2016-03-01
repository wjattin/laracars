<!DOCTYPE html>
<html>
    <head>
        <title>LaraCars 2.0</title>
        <link rel="stylesheet" href="{!! URL::asset('assets/css/foundation.css'); !!}">
        <link rel="stylesheet" href="{!! URL::asset('assets/foundation-icons/foundation-icons.css'); !!}">
    </head>
    <body>
    <div class="row large-12 columns">

        <!-- Begin Navigation -->
        <div class="top-bar">
            <div class="top-bar-left">
                <ul class="dropdown menu" data-dropdown-menu>
                    <li class="menu-text">LaraCars Vehicle Management System</li>
                    <li>
                        <a href="#">One</a>
                        <ul class="menu vertical">
                            <li><a href="#">One</a></li>
                            <li><a href="#">Two</a></li>
                            <li><a href="#">Three</a></li>
                        </ul>
                    </li>
                    <li><a href="/dealers">Dealers</a></li>
                    <li><a href="/vehicles">Vehicles</a></li>
                    <li><a href="/profiles">Profiles</a></li>
                </ul>
            </div>
            <div class="top-bar-right">
                <ul class="menu">
                    <li><input type="search" placeholder="Search"></li>
                    <li><button type="button" class="button">Search</button></li>
                </ul>
            </div>
        </div>
        <!-- End Navigation -->

        @yield('column-a')

        <footer class="footer">
            <p>Copyright &copy{!! date('Y'); !!}</p>
        </footer>
        <script src="{!! URL::asset('assets/js/vendor/jquery.min.js') !!}"></script>
        <script src="{!! URL::asset('assets/js/foundation.js') !!}"></script>
        <script src="{!! URL::asset('assets/js/vendor/what-input.min.js') !!}"></script>
        <script type="text/javascript">
            $(document).foundation();

            $(document).ready(function(){


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

        </script>

    </body>
</html>
