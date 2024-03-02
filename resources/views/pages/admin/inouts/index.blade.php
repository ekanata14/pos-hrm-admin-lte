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
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">In & Out Items History</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="suppliers-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Cart Id</th>
              <th>Item Id</th>
              <th>Item Name</th>
              <th>Item In</th>
              <th>Item Out</th>
              <th>Base Price</th> 
              <th>Sell Price</th>
              <th>Item Category</th>
              <th>Item Supplier</th>
              <th>User</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($inouts as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id_cart }}</td>
                <td>{{ $item->id_item }}</td>
                <td>{{ $item->name_item }}</td>
                <td>{{ $item->item_in }}</td>
                <td>{{ $item->item_out }}</td>  
                <td>{{ $item->name_category }}</td>
                <td>{{ $item->name_supplier }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->item_date }}</td>
                <td>
                    <a href="{{ route('items.edit', $item->id_item_in_out) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('items.delete.perform', $item->id_item_in_out) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $item->id_user }}" name="id_user">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr> 
              @empty
              <tr>
                <td colspan="13" class="text-center">No Data</td>
              </tr>
              @endforelse 
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Cart Id</th>
              <th>Item Id</th>
              <th>Item Name</th>
              <th>Item In</th>
              <th>Item Out</th>
              <th>Base Price</th> 
              <th>Sell Price</th>
              <th>Item Category</th>
              <th>Item Supplier</th>
              <th>User</th>
              <th>Date</th>
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
    $("#inouts-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#inouts-table_wrapper .col-md-6:eq(0)');
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