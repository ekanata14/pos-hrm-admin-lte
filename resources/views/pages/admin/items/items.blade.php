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
            <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add Items</a>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">items</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="items-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Base Price</th>
              <th>Sell Price</th>
              <th>Category</th>
              <th>Supplier</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($items as $item) 
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name_item }}</td>
                <td>{{ $item->base_price_item }}</td>
                <td>{{ $item->sell_price_item }}</td>
                <td>{{ $item->name_category }}</td>
                <td>{{ $item->name_supplier }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id_item) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('items.delete.perform', $item->id_item) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $item->id_user }}" name="id_user">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
              @empty
                 <tr>
                  <td colspan="7" class="text-center">No Data</td>
                 </tr> 
              @endforelse
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Base Price</th>
              <th>Sell Price</th>
              <th>Category</th>
              <th>Supplier</th>
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
    $("#items-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#items-table_wrapper .col-md-6:eq(0)');
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