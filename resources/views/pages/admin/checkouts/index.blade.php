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
          <h3 class="card-title">Checkout History</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="suppliers-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Cart Id</th>
              <th>Total</th>
              <th>Payment Method</th>   
              <th>Username</th>
              <th>Date Checkout</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($checkouts as $checkout)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $checkout->id_cart }}</td>
                <td>{{ $checkout->total }}</td>
                <td>{{ $checkout->payment_method }}</td>
                <td>{{ $checkout->username }}</td>
                <td>{{ $checkout->date_checkout }}</td>
                <td>
                    <a href="{{ route('checkouts.edit', $checkout->id_checkout) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('checkouts.delete.perform', $cart->id_checkout) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $checkout->id_checkout }}" name="id_cart">
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
              <th>Cart Id</th>
              <th>Total</th>
              <th>Payment Method</th>   
              <th>Username</th>
              <th>Date Checkout</th>
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