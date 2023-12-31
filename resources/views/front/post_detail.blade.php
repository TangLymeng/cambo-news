@extends('front.layout.app')

@section('main_content')
    <div class="page-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $post_detail->{'post_title_'.app()->getLocale()} }}</h2>
                    <nav class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('HOME')}}</a></li>
                            <li class="breadcrumb-item"><a
                                    href="{{ route('category', $post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->{'sub_category_name_'.app()->getLocale()} }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post_detail->{'post_title_'.app()->getLocale()} }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="featured-photo">
                        <img src="{{ asset('uploads/'.$post_detail->post_photo) }}" alt="">
                    </div>
                    <div class="sub">
                        <div class="item">
                            <b><i class="fas fa-user"></i></b>
                            <a href="">{{ $user_data->name }}</a>
                        </div>
                        <div class="item">
                            <b><i class="fas fa-edit"></i></b>
                            <a href="{{ route('category',$post_detail->sub_category_id) }}">{{ $post_detail->rSubCategory->{'sub_category_name_'.app()->getLocale()} }}</a>
                        </div>
                        <div class="item">
                            <b><i class="fas fa-clock"></i></b>
                            @php
                                $ts = strtotime($post_detail->updated_at);
                                $updated_date = date('d F, Y', $ts);
                            @endphp
                            {{ $updated_date }}
                        </div>
                        <div class="item">
                            <b><i class="fas fa-eye"></i></b>
                            {{ $post_detail->visitors }}
                        </div>
                        <div class="item">
                            @if (Auth::check())
                                <div class="breadcrumb-save">
                                    <form action="{{ route('posts.save', $post_detail->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                style="  background: none; border: none; color: inherit; cursor: pointer; padding: 0; text-decoration: underline;">
                                                <i class="fas fa-bookmark"></i>
                                            Save
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="main-text">
                        {!! $post_detail->{'post_detail_'.app()->getLocale()} !!}
                    </div>
                    <div class="tag-section">
                        <h2>@lang('TAGS')</h2>
                        <div class="tag-section-content">
                            @foreach($tag_data as $item)
                                @php
                                    $tag_name = '';
                                    if(App::getLocale() === 'en') {
                                        $tag_name = $item->tag_name_en;
                                    } elseif(App::getLocale() === 'kh') {
                                        $tag_name = $item->tag_name_kh;
                                    } elseif(App::getLocale() === 'cn') {
                                        $tag_name = $item->tag_name_cn;
                                    }
                                @endphp
                                <a href="{{ route('tag_posts_show', $tag_name) }}">
                                    <span class="badge bg-success">{{ $tag_name }}</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @php
                        $review = App\Models\Comment::where('news_id',$post_detail->id)->latest()->limit(5)->get();
                    @endphp


                    @foreach($review as $item)

                        @if($item->status == 1)
                            <div class="author2">
                                <div class="author-content2">
                                    <h6 class="author-caption2">
                                        <span> @lang('COMMENT') </span>
                                    </h6>
                                    <div class="author-image2">
                                        <img alt=""
                                             src="{{ (!empty($item->ruser->photo)) ? asset('uploads/'.$item->ruser->photo): asset('uploads/no_profile.jpg') }}"
                                             class="avatar avatar-96 photo" height="96" width="96" loading="lazy"></div>
                                    <div class="authorContent">
                                        <h1 class="author-name2">
                                            <a href=""> {{ $item->ruser->name }} </a>
                                        </h1>
                                        <p> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }} </p>
                                        <div class="author-details">{{ $item->comment }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    <hr>
                    @guest

                        <p><b> @lang('CHECK_AUTH_TO_COMMENT_MESSSAGE') <a href="{{ route('login') }}"> @lang('LOGIN')</a> | <a href="{{ route('register') }}"> @lang('REGISTER')
                                    </a> </b></p>

                    @else

                        <form action="{{ route('store.comment') }}" method="post" class="wpcf7-form init"
                              enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif


                            <input type="hidden" name="post_detail_id" value="{{ $post_detail->id }}">

                            <div style="display: none;">

                            </div>
                            <div class="main_section">


                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-title">
                                            @lang('COMMENT') *
                                        </div>
                                        <div class="contact-form">
                            <span class="wpcf7-form-control-wrap news_details">

                             <textarea name="comment" cols="20" rows="5"
                                       class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required"
                                       aria-required="true"
                                       aria-invalid="false" placeholder="@lang('WRITE_YOUR_COMMENT')"></textarea></span>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-btn">
                                        <input type="submit" value="@lang('SUBMIT_COMMENT')"
                                               class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                            class="wpcf7-spinner"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>

                    @endguest
                    <div class="related-news">
                        <div class="related-news-heading">
                            <h2>@lang('RELATED_NEWS')</h2>
                        </div>
                        <div class="related-post-carousel owl-carousel owl-theme">
                            @foreach($related_post_data as $item)
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                                    </div>
                                    <div class="category">
                                                <span
                                                    class="badge bg-success">{{ $post_detail->rSubCategory->{'sub_category_name_'.app()->getLocale()} }}</span>
                                    </div>
                                    <h3>
                                        <a href="{{ route('news_detail',$item->id) }}">{!! $item->{'post_title_'.app()->getLocale()}  !!} </a>
                                    </h3>
                                    <div class="date-user">
                                        <div class="user">
                                            <a href="">{{ $user_data->name }}</a>
                                        </div>
                                        <div class="date">
                                            <a href="">@php
                                                    $ts = strtotime($post_detail->updated_at);
                                                    $updated_date = date('d F, Y', $ts);
                                                @endphp
                                                {{ $updated_date }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 sidebar-col">

                    @include('front.layout.sidebar')

                </div>

            </div>
        </div>
    </div>

@endsection
