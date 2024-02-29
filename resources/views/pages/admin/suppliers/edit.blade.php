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
                <h3 class="card-title">Edit suppliers</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('suppliers.edit.perform', $supplier->id_supplier) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id_supplier" value="{{ $supplier->id_supplier }}">
                    <label for="suppliername">Supplier Name</label>
                    <input type="text" class="form-control" id="suppliername" placeholder="Enter Username" name="name_supplier" value="{{ $supplier->name_supplier }}">
                  </div>
                  <div class="form-group">
                    <label for="suppliername">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phone_number_supplier" value="{{ $supplier->phone_number_supplier }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <a href="{{ route('suppliers.index') }}" class="btn btn-info mr-2">Back</a>
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
    $("#suppliers-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#suppliers-table_wrapper .col-md-6:eq(0)');
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