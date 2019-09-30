@extends('admin.partials.app')

@section('title', 'add hours')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Hours</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ADD Hours') }}</div>

                            <div class="card-body">
                                @if(request()->path()=="hour/create")
                                    <form method="POST" action="{{ route('hour.store') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter hours') }}</label>

                                            <div class="col-md-6">
                                                <input id="hour" type="tel" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ old('hour') }}" required autocomplete="name" autofocus>

                                                @error('hour')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Contact') }}</label>

                                            <div class="col-md-6">
                                                <select name="contact_id"  class="form-control" >
                                                    @foreach($contacts as $contact)
                                                        <option value="{{$contact->id}}">{{$contact->phone}}</option>
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
                                    <form method="POST" action="{{ route('hour.update', $hour->id) }}">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Enter hours') }}</label>

                                            <div class="col-md-6">
                                                <input id="hour" type="tel" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ $hour->hour }}" required autocomplete="name" autofocus>

                                                @error('hour')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Select Contact') }}</label>

                                            <div class="col-md-6">
                                                <select name="contact_id"  class="form-control" >
                                                    @foreach($contacts as $contact)
                                                        <option value="{{$contact->id}}">{{$contact->phone}}</option>
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




