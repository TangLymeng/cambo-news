<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <title>Cambo News</title>

    <link rel="icon" type="image/png" href="{{ asset('uploads/logo.png') }}">

    <!-- All CSS -->
    @include('front.layout.styles')

    <!-- All Javascripts -->
    @include('front.layout.scripts')

    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6212352ed76fda0a"></script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-84213520-6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-84213520-6');
    </script>

</head>
<body>

    @include('front.layout.topbar')

   @include('front.layout.header')


    @include('front.layout.nav')
    @yield('main_content')

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ __('ABOUT_US') }}</h2>
                    <p>{{ __('FOOTER_COL_1_TEXT') }}</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ __('USEFUL_LINKS') }}</h2>
                    <ul class="useful-links">
                        <li><a href="index.html">{{ __('USEFUL_LINKS') }}</a></li>
                        <li><a href="terms.html">{{ __('TERM_AND_CONDITIONS') }}</a></li>
                        <li><a href="privacy.html">{{ __('PRIVACY_POLICY') }}</a></li>
                        <li><a href="disclaimer.html">{{ __('DISCLAIMER') }}</a></li>
                        <li><a href="contact.html">{{ __('CONTACT') }}</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{ __('CONTACT') }}</h2>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="right">
                            {{ __('FOOTER_ADDRESS') }}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="right">
                            {{ __('FOOTER_EMAIL') }}
                        </div>
                    </div>
                    <div class="list-item">
                        <div class="left">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="right">
                            {{ __('FOOTER_PHONE') }}
                        </div>
                    </div>
                    <ul class="social">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-pinterest-p"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="item">
                    <h2 class="heading">{{__('FOOTER_COL_4_HEADING')}}</h2>
                    <p>
                        {{__('NEWSLETTER_TEXT')}}
                    </p>
                    <form action="" method="post">
                        <div class="form-group">
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="{{__('SUBSCRIBE_NOW')}}">
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="copyright">
    {{ __('COPYRIGHT_TEXT') }}
</div>

<div class="scroll-top">
    <i class="fas fa-angle-up"></i>
</div>

    @include('front.layout.scripts_footer')
</body>

@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('error') }}',
        });
    </script>
@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('success') }}',
        });
    </script>
@endif

@if(session()->get('info'))
    <script>
        iziToast.info({
            title: '',
            position: 'topRight',
            message: '{{ session()->get('info') }}',
        });
    </script>
@endif
</html>
