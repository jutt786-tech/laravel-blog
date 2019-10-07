@extends('admin.partials.app')

@section('title', 'add Company')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Company</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form method="post"
                              action="@if(isset($company->id)) {{route('company.update',$company->id)}}
                              @else {{route('company.store')}}  @endif">
                            @if(isset($company->id)) @csrf @method('PUT') @else @csrf  @endif

                            <div id="locationappend">

                            <div class="text-info small"><strong>If You want to update company location then change the
                                    input value and press update button </strong></div>
                            <div class="form-row">

                                <div class="col-md-8 col-md-offset-2">
                                    <div class="position-relative form-group">
                                        <label for="cname" class="">Company Name</label>
                                        <input name="cname" id="cname_" placeholder="company" type="text"
                                               class="form-control"
                                               value="{{isset($company->cname) ? $company->cname : ''}}  ">
                                    </div>
                                </div>

                                @if(isset($company->branches))
                                    @foreach($company->branches as $branch)
                                        <input type="hidden" name="id[]" value="{{$branch->id}}">
                                        <div class="col-md-8 ">
                                            <div class="position-relative form-group">
                                                <label for="cname" class="">Enter Branch</label>
                                                <input name="bname[]" id="bname_" placeholder="branches" type="text"
                                                       class="form-control"
                                                       value="{{$branch->bname}}">
                                            </div>
                                        </div>

                                        <div class="col-md-8 ">
                                            <div class="position-relative form-group">
                                                <label for="cname" class="">Enter Location</label>
                                                <input name="location[]" id="location_" placeholder="Location" type="text"
                                                       class="form-control"
                                                       value="{{$branch->location}}">
                                            </div>
                                        </div>

                                    @endforeach
                                    @else
                                    <div class="col-md-8 ">
                                        <div class="position-relative form-group">
                                            <label for="cname" class="">Enter Branch</label>
                                            <input name="bname[]" id="bname_" placeholder="branches" type="text"
                                                   class="form-control"
                                                   value="">
                                        </div>
                                    </div>

                                    <div class="col-md-8 ">
                                        <div class="position-relative form-group">
                                            <label for="cname" class="">Enter Location</label>
                                            <input name="location[]" id="location_" placeholder="Location" type="text"
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
                                {{isset($company->cname) ? 'Update' : 'Submit'}}
                            </button>
                        </div>

                        </form>

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

    <!-- /#wrapper -->



@endsection
@section('js')
    <script type="text/javascript">

        $('#btn-add').on('click', function (e) {

            $.get("{{route('add.location')}}").done(function (data) {
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



