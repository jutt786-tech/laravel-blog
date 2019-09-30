@extends('admin.partials.app')

@section('title', 'add Branch')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Branch</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ADD Branch') }}</div>

                            <div class="card-body">
                                @if(request()->path()=="branch/create")
                                    <form method="POST" action="{{ route('branch.store') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Branch') }}</label>

                                            <div class="col-md-6">
                                                <input id="bname" type="text" class="form-control @error('bname') is-invalid @enderror" name="bname" value="{{ old('bname') }}" required autocomplete="name" autofocus>

                                                @error('bname')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Location') }}</label>

                                            <div class="col-md-6">
                                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="name" autofocus>

                                                @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Contacts') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <select name="contact_id[]"  class="form-control" multiple>--}}
{{--                                                    @foreach($contacts as $contact)--}}
{{--                                                        <option value="{{$contact->id}}">{{$contact->phone}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}




                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('branch.update', $branch->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Branch') }}</label>

                                                <div class="col-md-6">
                                                    <input id="bname" type="text" class="form-control @error('bname') is-invalid @enderror" name="bname" value="{{$branch->bname}}" required autocomplete="name" autofocus>

                                                    @error('bname')
                                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter Location') }}</label>

                                            <div class="col-md-6">
                                                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ $branch->location }}" required autocomplete="name" autofocus>

                                                @error('location')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

{{--                                        <div class="form-group row">--}}
{{--                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Contacts') }}</label>--}}

{{--                                            <div class="col-md-6">--}}
{{--                                                <select name="contact_id[]"  class="form-control" multiple>--}}
{{--                                                    @foreach($contacts as $contact)--}}
{{--                                                        <option value="{{$contact->id}}">{{$contact->phone}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}




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




