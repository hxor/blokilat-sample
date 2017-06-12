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
          <h1 class="page-header">Categories <a href="{{ route('admin.category.create') }}" class="btn btn-success"> Add Category</a> </h1>
      </div>
      <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
  <div class="row">
      <div class="col-lg-12">
          <div class="panel panel-default">
              <div class="panel-heading">
                  Table Categories
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                          <tr>
                              <th>ID</th>
                              <th>Title</th>
                              <th>Date</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $category)
                            <tr class="odd gradeX">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category }}</td>
                                <td class="center">{{ $category->created_at }}</td>
                                <td class="center">
                                  {!! Form::model($category, ['route' => ['admin.category.destroy', $category->id], 'method' => 'DELETE']) !!}
                                    <a href="{{ route('admin.category.show', $category->id) }}"> <button type="button" class="btn btn-primary btn-xs">Show</button> </a>
                                    <a href="{{ route('admin.category.edit', $category->id) }}"> <button type="button" class="btn btn-warning btn-xs">Edit</button> </a>
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
