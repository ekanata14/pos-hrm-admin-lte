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
        <div class="col-12">
    {{-- <div class="card"> --}}
        {{-- <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
        <!-- general form elements -->
            <div class="card card-warning2">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('category.edit.perform', $category->id_category) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id_category" value="{{ $category->id_category }}">
                    <label for="categoryName">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" placeholder="Enter Username" name="name_category" value="{{ $category->name_category }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <a href="{{ route('categoriess.index') }}" class="btn btn-info mr-2">Back</a>
                  <button type="submit" class="btn btn-warning">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        {{-- </div --}}
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