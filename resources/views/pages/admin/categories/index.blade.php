@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
        @include('components.contentHeader')
    <!-- /.content-header -->

    <!-- Card -->
        @include('components.cards') 
    <!-- /.card -->

    <!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12 p-3">
            <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add Category</a>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Item Category</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="category-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Category Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name_category }}</td>
                <td>
                    <a href="{{ route('category.edit', $category->id_category) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('category.delete.perform', $category->id_category) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $category->id_category }}" name="id_category">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
                  
              @empty
              <tr>
                <td colspan="3" class="text-center">No Data</td>
              </tr>
                  
              @endforelse
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Supplier Name</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>
@endsection
@push('scripts')    
<script>
  $(function () {
    $("#category-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#category-table_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush