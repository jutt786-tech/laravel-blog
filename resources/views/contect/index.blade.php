@extends('admin.partials.app')

@section('title', 'welcom to contacts')

@section('content')
    <div class="container-fluid">

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Contacts</a>
                    </li>
                    <li class="breadcrumb-item active">Overview</li>
                </ol>

                <!-- Icon Cards-->
                <hr>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <a href="{{route('contect.create')}}" class="btn btn-info" >ADD Contact</a>
                <hr>
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Total Contact record</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Branch</th>
                                    <th>Contact </th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Branch</th>
                                    <th>Contact </th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($branches as $branch)
                                    <tr>
                                        <td>{{$branch->id}}</td>
                                        <td>{{$branch->bname}}</td>
                                        <td>
                                        @foreach($branch->contact as $b)
                                        {{$b->phone}},
                                        @endforeach
                                        </td>

                                        <td><a href="{{ route('contect.index') }}/{{$branch->id}}/edit" class="btn btn-primary">edit</a></td>
                                        <td>
                                            <form action="{{ route('contect.index') }}/{{$branch->id}}" method="post">
                                                @method('DELETE')
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                <button type="submit" class="btn btn-danger">Delted</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>

            </div>
            <!-- /.container-fluid -->

            <!-- Sticky Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.content-wrapper -->


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




