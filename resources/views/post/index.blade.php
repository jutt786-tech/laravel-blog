@extends('admin.partials.app')

@section('title', 'Post page')

@section('content')
    <div class="container-fluid">

        <div id="content-wrapper">

            <div class="container-fluid">

                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Post</a>
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

                <a href="{{route('post.create')}}" class="btn btn-info" >ADD Post</a>
                <hr>
                <!-- DataTables Example -->
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Total post record</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>title </th>
                                    <th>Description</th>
                                    <th>Username</th>
                                    <th>Category</th>
                                    <th>image</th>
                                    <th>edit</th>
                                    <th>delete</th>

                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>title </th>
                                    <th>Description</th>
                                    <th>Username</th>
                                    <th>Category</th>
                                    <th>image</th>
                                    <th>edit</th>
                                    <th>delete</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td>{{substr($post->title, 0 , 7)}}</td>
                                        <td>{{substr($post->body,0, 80)}}</td>
                                        <td>{{$post->user->name}}</td>
                                        <td>{{$post->category->nam}}</td>
                                        <td><img src="{{asset($post->img)}}" width="100" height="50" alt="no img here"></td>

                                        <td><a href="{{ route('post.index') }}/{{$post->id}}/edit" class="btn btn-primary">edit</a></td>
                                        <td>
                                            <form action="{{ route('post.index') }}/{{$post->id}}" method="post">
                                                @method('DELETE')
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">

                                                <button type="submit" class="btn btn-danger">Deleted</button>
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




