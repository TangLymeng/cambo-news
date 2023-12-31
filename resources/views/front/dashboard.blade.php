@extends('front.layout.app')
@section('main_content')

    <div class="container">


        <div class="row">
            <div class="col-md-4">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-wrpp">


                            <figure class="authorPage-image">
                                <img alt=""
                                     src="{{ empty($userData->provider_id) ? asset('uploads/'.$userData->photo) : $userData->photo }}"
                                     class="avatar avatar-96 photo" height="96" width="96" loading="lazy"></figure>
                            <h1 class="authorPage-name">
                                <a href=" "> {{ $userData->name }} </a>
                            </h1>
                            <h6 class="authorPage-name">
                                {{ $userData->email }}
                            </h6>


                            <ul>
                                <li><a href="{{ route('posts.saved') }}"> <b>🟠 @lang('READ_LATER_LIST') </b> </a></li>
                                <li> <a href="{{ route('user.logout') }}"> <b>🟠 @lang('LOGOUT') </b> </a> </li>
                            </ul>

                        </div>
                    </div>
                </div>


            </div>

            <div class="col-md-8">


                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="contact-wrpp">
                            <h4 class="contactAddess-title text-center">
                                @lang('USER_ACCOUNT') </h4>
                            <div role="form" class="wpcf7" id="wpcf7-f437-o1" lang="en-US" dir="ltr">
                                <div class="screen-reader-response"><p role="status" aria-live="polite"
                                                                       aria-atomic="true"></p>
                                    <ul></ul>
                                </div>
                                <form action="{{ route('user.profile.store') }}" method="post" class="wpcf7-form init"
                                      enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                                    @csrf
                                    <div style="display: none;">

                                    </div>

                                    <div class="main_section">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    @lang('NAME') *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                                                                           name="name"
                                                                                                           value="{{ $userData->name }}"
                                                                                                           size="40"
                                                                                                           class="wpcf7-form-control wpcf7-text"
                                                                                                           aria-invalid="false"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    @lang('EMAIL') *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                                                                           name="email"
                                                                                                           value="{{ $userData->email }}"
                                                                                                           size="40"
                                                                                                           class="wpcf7-form-control wpcf7-text"
                                                                                                           aria-invalid="false"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    @lang('PHONE') *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                                                                           name="mobile_number"
                                                                                                           value="{{ $userData->mobile_number }}"
                                                                                                           size="40"
                                                                                                           class="wpcf7-form-control wpcf7-text"
                                                                                                           aria-invalid="false"></span>
                                                </div>
                                            </div>


                                            <div class="col-md-12 col-sm-12">
                                                <div class="contact-title ">
                                                    @lang('PHOTO') *
                                                </div>
                                                <div class="contact-form">
                                                    <span class="wpcf7-form-control-wrap sub_title"><input type="file"
                                                                                                           name="photo"
                                                                                                           value=""
                                                                                                           size="40"
                                                                                                           class="wpcf7-form-control wpcf7-text"
                                                                                                           aria-invalid="false"></span>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="contact-btn">
                                                    <input type="submit" value="@lang('UPDATE')"
                                                           class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                                        class="wpcf7-spinner"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpcf7-response-output" aria-hidden="true"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div> <!--  // end row -->


    </div>
@endsection

