<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li class="today-text">{{ date('d-M-Y') }}</li>
                    <li class="email-text">{{ __('FOOTER_EMAIL') }}</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul class="right">
                    <li class="menu"><a href="faq.html">{{__('FAQ')}}</a></li>
                    <li class="menu"><a href="{{ route('about') }}">{{__('ABOUT_US')}}</a></li>
                    <li class="menu"><a href="contact.html">{{__('CONTACT')}}</a></li>
                    @auth
                        <li class="menu"><a href="{{ route('dashboard') }}"><b> {{__('PROFILE')}}</b></a></li>
                    @else
                        <li class="menu"><a href="{{ route('login') }}"><b> {{__('LOGIN')}}</b></a></li>
                        <li class="menu"><a href="{{ route('register') }}"> <b>{{__('REGISTER')}}</b></a></li>
                    @endauth
                    <li class="menu">
                        <div class="language-switch">
                            @foreach (config('app.available_locales') as $locale => $localeName)
                                <a href="{{ request()->url() }}?language={{ $locale }}"
                                   class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                    [{{ $localeName }}]
                                </a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
