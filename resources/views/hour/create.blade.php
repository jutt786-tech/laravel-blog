@extends('admin.partials.app')

@section('title', 'add Hour')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Hour</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">{{ __('ADD Contact') }}</div>

                            <div class="card-body">

                                <form method="POST" action="@if(isset($br->id)){{route('hour.update',$br->id) }} @else {{ route('hour.store') }} @endif ">


                                    @if(isset($br->id)) @csrf @method('PUT') @else @csrf  @endif
                                    <div id="locationappend">

                                        <div class="form-row">
                                            @if(isset($br->id))
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="position-relative form-group">
                                                        <label for="bname" class="">Enter Branches</label>
                                                        <input name="bname" id="bname_" placeholder="Branch" type="text"
                                                               class="form-control"
                                                               value="{{$br->bname}}">
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="position-relative form-group">
                                                        <label for="bname" class="">Enter Branches</label>
                                                        <select name="branch_id" class="form-control">
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->bname}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif


                                            @if(isset($br->hours))
                                                @foreach($br->hours as $h)
                                                    <input type="hidden" name="id[]" value="{{$h->id}}">
                                                    <div class="col-md-8 ">
                                                        <div class="position-relative form-group">
                                                            <label for="hour" class="">Enter Hour</label>
                                                            <input name="hour[]" id="hour_" placeholder="Hour" type="text"
                                                                   class="form-control"
                                                                   value="{{$h->hour}}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-md-8 ">
                                                    <div class="position-relative form-group">
                                                        <label for="hour" class="">Enter Hour</label>
                                                        <input name="hour[]" id="hour_" placeholder="Hour" type="text"
                                                               class="form-control"
                                                               value="">
                                                    </div>
                                                </div>

                                            @endif

                                            <div class="col-md-2" style="margin-top: 32px">
                                                <a href="javascript:void(0);"
                                                   class="btn-wide btn-shadow btn btn-info" id="btn-add"
                                                   title="add location form">+</a>

                                                <a href="javascript:void(0);"
                                                   class="btn-wide btn-shadow btn btn-danger" id="btn-remove"
                                                   title="remove location form">-</a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="form-row col-md-12 ">
                                        <button type="submit" class="btn btn-primary">
                                            @if(isset($br->id)) {{'Update'}} @else {{'Submit'}}  @endif
                                        </button>
                                    </div>

                                </form>

                            </div>
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
@section('js')
    <script type="text/javascript">

        $('#btn-add').on('click', function (e) {

            $.get("{{route('add.hour')}}").done(function (data) {
                $('#locationappend').append(data);
            })
            $('#location').append('gsvdv');
        });
        $('#btn-remove').on('click', function (e) {
            $('.opt:last').remove();
            $('hr:last').remove();
        });


    </script>
@endsection




