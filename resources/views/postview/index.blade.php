@extends('postview.main')

@section('title', 'Post home page')

@section('content')

    @foreach($posts as $post)
            <div class="col-lg-2 col-md-5 ">
            <div class="post-preview">


                <img class="mt-5" src="{{asset($post->img)}}" width="150" height="150">
            </div>
        </div>
        <div class="col-lg-10 col-md-10 ">

            <div class="post-preview">
                <a href="{{ route('postview.index') }}/{{$post->id}} ">
                    <h2 class="post-title">
                        {{substr($post->title, 0 , 7)}}
                    </h2>
                    <h3 class="post-subtitle">
                        {{substr($post->body,0, 150)}}
                    </h3>
                </a>

                <p class="post-meta">Category
                    :<a href="#"> {{$post->category->nam}}</a>
                    </p>

                <p class="post-meta">Posted by
                    <a href="#"> {{$post->user->name}}</a>
                    on  {{$post->created_at}}</p>
            </div>
            <hr>

            <!-- Pager -->
        </div>

    @endforeach
    <br>
{{--    {{ $posts->links() }}--}}
    <br>
@endsection

{{--    @foreach($posts as $post)--}}
{{--        <br>{{$post->nam}}<br>--}}
{{--        @foreach($post->posts->sortBy('title') as $postss)--}}
{{--            <br>--}}
{{--            {{$postss->title}}--}}
{{--            {{$postss->user->name}}--}}
{{--        @endforeach--}}
{{--    @endforeach--}}
