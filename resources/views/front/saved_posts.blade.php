@extends('front.layout.app')
@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Saved Posts</h1>
                <hr>
                @if(count($saved_posts) > 0)
                    @foreach($saved_posts as $post)
                        <div class="card mb-3">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
                                    <a href="{{ route('news_detail', $post->id) }}">
                                        <h6>{{ $post->post_title }}</h6>
                                    </a>
                                    <form action="{{ route('delete_saved_post', $post->id) }}" method="POST" id="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                style="background: none; border: none; color: inherit; cursor: pointer; padding: 0; text-decoration: underline;" >
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="card-body">
                                <img src="{{ asset('uploads/'.$post->post_photo) }}" alt="" style="width: 250px">
                            </div>
                            @endforeach
                            @else
                                <h3>No Saved Posts</h3>
                            @endif

                            <div class="col-md-12">
                                {{ $saved_posts->links() }}
                            </div>

                        </div>
            </div>
        </div>
    </div>
@endsection
