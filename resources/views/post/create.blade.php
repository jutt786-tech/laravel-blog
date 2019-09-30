@extends('admin.partials.app')

@section('title', 'add post')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">post</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ADD POST') }}</div>

                            <div class="card-body">
                                @if(request()->path() == "post/create")
                                    <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter title') }}</label>

                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Body') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="body" type="text" col="6" row="5" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="name" autofocus></textarea>

                                                @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>

                                            <div class="col-md-6">
                                                <select name="category_id"  class="form-control"  >
                                                    @foreach($categorys as $category)
                                                        <option value="{{$category->id}}"
                                                        >{{$category->nam}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <select name="user_id"  class="form-control" >--}}
{{--                                                    @foreach($users as $user)--}}
{{--                                                        <option value="{{$user->id}}"--}}
{{--                                                        >{{$user->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select File') }}</label>

                                            <div class="col-md-6">
                                               <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Submit') }}
                                                        </button>
                                                    </div>
                                                </div>

                                    </form>
                                @else
                                    <form method="POST" action="{{ route('post.update',$posts->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter title') }}</label>

                                            <div class="col-md-6">
                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $posts->title }}" required autocomplete="name" autofocus>

                                                @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Body') }}</label>

                                            <div class="col-md-6">
                                                <textarea id="body" type="text" col="6" row="5" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autocomplete="name" autofocus>{{$posts->body}}</textarea>

                                                @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Category') }}</label>

                                            <div class="col-md-6">
                                                <select name="category_id"  class="form-control"  >
                                                    @foreach($categorys as $category)
                                                        <option value="{{$category->id}}"
                                                            {{$posts->category_id == $category->id ? 'selected' : ''}}
                                                        >{{$category->nam}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <select name="user_id"  class="form-control"  >--}}
{{--                                                    @foreach($users as $user)--}}
{{--                                                        <option value="{{$user->id}}"--}}
{{--                                                            {{$posts->user_id == $user->id ? 'selected' : ''}}--}}
{{--                                                        >{{$user->name}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select File') }}</label>

                                            <div class="col-md-6">
                                                <input type="file" class="form-control" name="img">
                                            </div>
                                        </div>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>



                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>


        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Your Website 2019</span>
                </div>
            </div>
        </footer>

    </div>

    </div>
    <!-- /#wrapper -->
@endsection




