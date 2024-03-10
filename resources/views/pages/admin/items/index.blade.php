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
            <a href="{{ route('suppliers.create') }}" class="btn btn-primary mb-3">Add Supplier</a>
            <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add Items</a>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Suppliers</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="suppliers-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Supplier Name</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($suppliers as $supplier)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->name_supplier }}</td>
                <td>
                    <a href="{{ route('items.show', $supplier->id_supplier) }}" class="btn btn-info">Detail</a> 
                </td>
            </tr> 
              @empty
              <tr>
                <td colspan="4" class="text-center">No Data</td>
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