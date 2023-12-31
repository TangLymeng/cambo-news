@extends('admin.layout.app')

@section('heading', 'Add Post')

@section('button')
    <a href="{{ route('admin_post_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Back To All Post
        Page</a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>Post Title * (EN)</label>
                                <input type="text" class="form-control" name="post_title_en" value="">
                            </div>
                            <div class="form-group mb-3">
                                 <label>Post Detail * (EN)</label>
                                <textarea name="post_detail_en" class="form-control snote" id="" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Title * (KH)</label>
                                <input type="text" class="form-control" name="post_title_kh" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Detail * (KH)</label>
                                <textarea name="post_detail_kh" class="form-control snote" id="" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Title (CN) *</label>
                                <input type="text" class="form-control" name="post_title_cn"
                                       value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Detail (CN) *</label>
                                <textarea name="post_detail_cn" class="form-control snote" id="" cols="30"
                                          rows="10"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label>Post Photo *</label>
                                <div>
                                    <input type="file" name="post_photo">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label>Select Category</label>
                                <select name="sub_category_id" class="form-control select2">
                                    @foreach($sub_categories as $item)
                                         <option value="{{ $item->id }}">{{ $item->sub_category_name_en }}
                                            ({{ $item->rCategory->category_name_en }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Shareable?</label>
                                <select name="is_share" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Is Commentable?</label>
                                <select name="is_comment" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <h4>Please sure that all 3 tags field has the same num of element</h4>
                            <div class="form-group mb-3">
                                <label>Tags in English (Please separate each tag by comma symbol)</label>
                                <input type="text" class="form-control" name="tags_en" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Tags in Khmer (Please separate each tag by comma symbol)</label>
                                <input type="text" class="form-control" name="tags_kh" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Tags in Chinese (Please separate each tag by comma symbol)</label>
                                <input type="text" class="form-control" name="tags_cn" value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
