@extends('admin.partials.app')

@section('title', 'add Phone')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Phone</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ADD PHONE') }}</div>

                            <div class="card-body">
                                @if(request()->path()=="phone/create")
                                <form method="POST" action="{{ route('phone.store') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Phone') }}</label>

                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>

                                        <div class="col-md-6">
                                            <select name="user_id"  class="form-control">
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->name}}</option>
                                                @endforeach
                                            </select>

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
                                    <form method="POST" action="{{ route('phone.update',$phone->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Phone') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$phone->phone}}" required autocomplete="name" autofocus>

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select User') }}</label>

                                            <div class="col-md-6">
                                                <select name="user_id"  class="form-control">
                                                    @foreach($users as $user)
                                                        <option value="{{$user->id}}" {{$phone->user_id==$user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                    @endforeach
                                                </select>

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


            {{--            <div class="col-md-8 col-md-offset-2">--}}
            {{--                <form method="post" action="{{route('user.store')}}">--}}
            {{--                    @csrf--}}
            {{--                    <div class="form-group">--}}
            {{--                        <label for="name">User name</label>--}}
            {{--                        <input type="name" class="form-control" name="name" id="name"  placeholder="Enter your name ">--}}
            {{--                        <small id="emailHelp" class="form-text text-muted">Enter valid name</small>--}}
            {{--                    </div>--}}
            {{--                    <div class="form-group">--}}
            {{--                        <label for="email">Email</label>--}}
            {{--                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">--}}
            {{--                    </div>--}}

            {{--                    <button type="submit" class="btn btn-primary">Submit</button>--}}
            {{--                </form>--}}
            {{--            </div>--}}
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


