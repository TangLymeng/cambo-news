@extends('admin.layout.app')

@section('heading', 'All Approved Comment')

@section('main_content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>News</th>
                                    <th>UserName</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($review as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('uploads/'.$row['rnews']['post_photo']) }} "
                                                 style="width:200px"></td>
                                        <td>{{ $row['rnews']['post_title'] }}</td>
                                        <td>{{ $row['ruser']['name'] }}</td>
                                        <td>{{ Str::limit($row->comment, 25) }}</td>
                                        <td>
                                            @if($row->status == 0)
                                                <span class="badge badge-pill bg-danger">Pending</span>

                                            @else
                                                <span class="badge badge-pill bg-success">Publish</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin_comment_delete',$row->id) }} "
                                               class="btn btn-primary rounded-pill waves-effect waves-light"
                                               onClick="return confirm('Are you sure?');">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
