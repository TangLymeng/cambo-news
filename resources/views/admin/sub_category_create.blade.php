@extends('admin.layout.app')

@section('heading', 'Create SubCategory')

@section('button')
    <a href="{{ route('admin_sub_category_show') }}" class="btn btn-primary"><i class="fas fa-eye"></i> Back To View Page</a>
@endsection

@section('main_content')
    <div class="section-body">
        <form action="{{ route('admin_sub_category_store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label>SubCategory Name (EN) *</label>
                                <input type="text" class="form-control" name="sub_category_name_en" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>SubCategory Name (KH) *</label>
                                <input type="text" class="form-control" name="sub_category_name_kh" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>SubCategory Name (CN) *</label>
                                <input type="text" class="form-control" name="sub_category_name_cn" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on menu?</label>
                                <select name="show_on_menu" class="form-control">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>Show on home?</label>
                                <select name="show_on_home" class="form-control">
                                    <option value="Show">Show</option>
                                    <option value="Hide">Hide</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label>SubCategory Order *</label>
                                <input type="text" class="form-control" name="sub_category_order" value="">
                            </div>
                            <div class="form-group mb-3">
                                <label>Select Category</label>
                                <select name="category_id" class="form-control" id="">
                                @foreach($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name_en }}</option>
                                @endforeach
                                </select>
                            </div>
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
