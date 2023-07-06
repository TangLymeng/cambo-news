@extends('front.layout.app')

@section('main_content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ __('ABOUT_US') }}</h2>
                <nav class="breadcrumb-container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('HOME') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('ABOUT_US') }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>{{ __('ABOUT_FIRST_PARAGRAPH') }}</p>
                <p>{{ __('ABOUT_SECOND_PARAGRAPH') }}</p>
                <p>{{ __('ABOUT_THIRD_PARAGRAPH') }}</p>
                <p>{{ __('ABOUT_FOURTH_PARAGRAPH') }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
