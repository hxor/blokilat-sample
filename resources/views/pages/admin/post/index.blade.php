@extends('layouts.back')

@section('header')
  <!-- DataTables CSS -->
  <link href="{{ asset('back/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="{{ asset('back/vendor/datatables-responsive/dataTables.responsive.css') }}" rel="stylesheet">
@endsection

@section('content')
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Posts <a href="{{ route('admin.post.create') }}" class="btn btn-success"> Add Post</a> </h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Table Posts
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Categories</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($posts as $post)
                            <tr class="odd gradeX">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>{{ $post->category->category }}</td>
                                <td>{{ $post->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                  {!! Form::model($post, ['route' => ['admin.post.destroy', $post->id], 'method' => 'DELETE']) !!}
                                    <a href="{{ route('post', $post->id) }}"> <button type="button" class="btn btn-primary btn-xs">Show</button> </a>
                                    <a href="{{ route('admin.post.edit', $post->id) }}"> <button type="button" class="btn btn-warning btn-xs">Edit</button> </a>
                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                  {!! Form::close() !!}
                                </td>
                            </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <!-- /.table-responsive -->
              </div>
              <!-- /.panel-body -->
          </div>
          <!-- /.panel -->
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
@endsection

@section('footer')
  <!-- DataTables JavaScript -->
  <script src="{{ asset('back/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('back/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('back/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>

  <!-- Page-Level Demo Scripts - Tables - Use for reference -->
  <script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });
  </script>
@endsection
