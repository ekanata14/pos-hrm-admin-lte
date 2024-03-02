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
              <th>User</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($carts as $cart)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cart->id_cart }}</td>
                <td>{{ $cart->username }}</td>
                <td>
                    <a href="{{ route('carts.edit', $cart->id_cart) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('carts.delete.perform', $cart->id_item_in_out) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $cart->id_cart }}" name="id_cart">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
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
              <th>Cart Id</th>
              <th>User</th>
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