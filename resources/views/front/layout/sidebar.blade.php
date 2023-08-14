<div class="sidebar">

    <div class="widget">
        @foreach($global_sidebar_top_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif
            </div>
        @endforeach
    </div>

    <div class="widget">
        <div class="tag-heading">
            <h2>@lang('TAGS')</h2>
        </div>
        <div class="tag">
            @php
                $all_tags = App\Models\Tag::select('tag_name_en', 'tag_name_kh', 'tag_name_cn')->distinct()->get();
                $currentLanguage = App::getLocale(); // Assuming you're using Laravel localization
            @endphp

            @foreach($all_tags as $item)
                <div class="tag-item">
                    <a href="{{ route('tag_posts_show', $item['tag_name_' . $currentLanguage]) }}">
                        <span class="badge bg-secondary">{{ $item['tag_name_' . $currentLanguage] }}</span>
                    </a>
                </div>
            @endforeach
        </div>

    </div>

    <div class="widget">
        <div class="news">
            <div class="news-heading">
                <h2>@lang('POPULAR_NEWS')</h2>
            </div>

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">@lang('RECENT_NEWS')</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">@lang('POPULAR_NEWS')</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @foreach($global_recent_news_data as $item)
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->{'post_title_'.app()->getLocale()} }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                            @if($item->author_id==0)
                                                @php
                                                $user_data = App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else

                                            @endif
                                                <a href="">{{ $user_data->name }}</a>
                                    </div>
                                    <div class="date">
                                        <a href="">@php
                                                $ts = strtotime($item->updated_at);
                                                $updated_date = date('d F, Y', $ts);
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>                                                        
                                    <div class="ms-3">
                                        @if (Auth::check())
                                            <div class="breadcrumb-save">
                                                <form action="{{ route('posts.save', $item->id) }}" method="POST">
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
                            </div>
                        </div>

                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @foreach($global_popular_news_data as $item)
                        <div class="news-item">
                            <div class="left">
                                <img src="{{ asset('uploads/'.$item->post_photo) }}" alt="">
                            </div>
                            <div class="right">
                                <div class="category">
                                    <span class="badge bg-success">{{ $item->rSubCategory->sub_category_name }}</span>
                                </div>
                                <h2><a href="{{ route('news_detail',$item->id) }}">{{ $item->{'post_title_'.app()->getLocale()} }}</a></h2>
                                <div class="date-user">
                                    <div class="user">
                                        <a href="">
                                            @if($item->author_id==0)
                                                @php
                                                    $user_data = App\Models\Admin::where('id',$item->admin_id)->first();
                                                @endphp
                                            @else

                                            @endif
                                            <a href="">{{ $user_data->name }}</a>
                                        </a>
                                    </div>
                                    <div class="date">
                                        <a href="">@php
                                                $ts = strtotime($item->updated_at);
                                                $updated_date = date('d F, Y', $ts);
                                            @endphp
                                            {{ $updated_date }}
                                        </a>
                                    </div>
                                    <div class="ms-3">
                                        @if (Auth::check())
                                            <div class="breadcrumb-save">
                                                <form action="{{ route('posts.save', $item->id) }}" method="POST">
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
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="widget">
        @foreach($global_sidebar_bottom_ad as $row)
            <div class="ad-sidebar">
                @if($row->sidebar_ad_url == '')
                    <img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt="">
                @else
                    <a href="{{ $row->sidebar_ad_url }}"><img src="{{ asset('uploads/'.$row->sidebar_ad) }}" alt=""></a>
                @endif
            </div>
        @endforeach

    </div>

</div>
