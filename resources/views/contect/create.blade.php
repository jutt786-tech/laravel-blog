@extends('admin.partials.app')

@section('title', 'add Contact')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Contact</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">@if(isset($br->id)){{ __('Update Contact') }} @else {{ __('ADD Contact') }}  @endif</div>

                            <div class="card-body">

                                <form method="POST" action="@if(isset($br->id)){{route('contect.update',$br->id) }}}} @else {{ route('contect.store') }} @endif ">


                                    @if(isset($br->id)) @csrf @method('PUT') @else @csrf  @endif
                                    <div id="locationappend">

                                        <div class="form-row">
                                            @if(isset($br->bname))
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="position-relative form-group">
                                                        <label for="cname" class="">Enter Branches</label>
                                                        <input name="bname" id="bname_" placeholder="Branch" type="text"
                                                               class="form-control"
                                                               value="{{$br->bname}}">

                                                        {{--                                                        <select name="branch_id" class="form-control">--}}
{{--                                                            @foreach($branches as $branch)--}}
{{--                                                                <option value="{{$branch->id}}">{{$branch->bname}}</option>--}}
{{--                                                            @endforeach--}}
{{--                                                        </select>--}}
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-8 col-md-offset-2">
                                                    <div class="position-relative form-group">
                                                        <label for="cname" class="">Enter Branches</label>
                                                        <select name="branch_id" class="form-control">
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}">{{$branch->bname}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(isset($br->contact))
                                                @foreach($br->contact as $c)
                                                    <input type="hidden" name="id[]" value="{{$c->id}}">
                                                    <div class="col-md-8 ">
                                                        <div class="position-relative form-group">
                                                            <label for="phone" class="">Enter Phone</label>
                                                            <input name="phone[]" id="phone_" placeholder="Phoen" type="text"
                                                                   class="form-control"
                                                                   value="{{$c->phone}}">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else

                                                <div class="col-md-8 ">
                                                    <div class="position-relative form-group">
                                                        <label for="phone" class="">Enter Phone</label>
                                                        <input name="phone[]" id="phone_" placeholder="Phoen" type="text"
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

            $.get("{{route('add.contact')}}").done(function (data) {
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




