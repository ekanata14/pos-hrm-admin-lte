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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add supplier</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route("suppliers.create.perform") }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="suppliername">Supplier Name</label>
                    <input type="text" class="form-control" id="supplierName" placeholder="Enter Supplier Name" name="name_supplier">
                  </div>
                  <div class="form-group">
                    <label for="suppliername">Phone Number</label>
                    <input type="number" class="form-control" id="phoneNumberSupplier" placeholder="Enter Phone Number Supplier" name="phone_number_supplier">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <a href="{{ route('suppliers.index') }}" class="btn btn-info mr-2">Back</a>
                  <button type="submit" class="btn btn-primary">Submit</button>
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