@extends('admin.layout.app')

@section('heading', 'Setting')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_setting_update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-1-tab" data-toggle="pill" href="#v-1" role="tab" aria-controls="v-1" aria-selected="true">
                                            Home Page
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-9 col-md-8 col-sm-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="pt_0 tab-pane fade show active" id="v-1" role="tabpanel" aria-labelledby="v-1-tab">
                                            <!-- Home Page Start -->
                                            <div class="form-group mb-3">
                                                <label>News Ticker Total * </label>
                                                <input type="text" class="form-control" name="news_ticker_total" value="{{ $setting_data->news_ticker_total }}">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Status</label>
                                                <select name="news_ticker_status" class="form-control">
                                                    <option value="Show" @if($setting_data->news_ticker_status == 'Show') selected @endif>Show</option>
                                                    <option value="Hide" @if($setting_data->news_ticker_status == 'Hide') selected @endif>Hide</option>
                                                </select>
                                            </div>
                                            <!-- Home Page End -->
                                        </div>

                                        <div class="pt_0 tab-pane fade" id="v-2" role="tabpanel" aria-labelledby="v-2-tab">
                                            <div class="form-group mb-3">
                                                <label>Status</label>
                                                <select name="" class="form-control">
                                                    <option value="Show">Show</option>
                                                    <option value="Hide">Hide</option>
                                                </select>
                                            </div>
                                            <!-- Text Item End -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt_30">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
