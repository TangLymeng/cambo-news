<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">{{ date('d-M-Y') }}</li>
                    <li class="email-text">cambo-news@cam.asia</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    <li class="menu"><a href="faq.html">FAQ</a></li>
                    <li class="menu"><a href="{{ route('about') }}">About</a></li>
                    <li class="menu"><a href="contact.html">Contact</a></li>
                    @auth
                        <li class="menu"><a href="{{ route('dashboard') }}"><b> Profile </b></a></li>
                    @else
                        <li class="menu"><a href="{{ route('login') }}"><b> Login </b></a></li>
                        <li class="menu"><a href="{{ route('register') }}"> <b>Register</b> </a></li>
                    @endauth
                    <li class="menu">
                        <div class="language-switch">
                            @foreach (config('app.available_locales') as $locale)
                                <a href="{{ request()->url() }}?language={{ $locale }}"
                                   class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                    [{{ strtoupper($locale) }}]
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
