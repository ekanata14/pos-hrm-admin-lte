@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
        @include('components.contentHeader')
    <!-- /.content-header -->

    <!-- Main content -->

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 col-12 p-3">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">POS System</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
          @forelse ($items as $item)
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h5 class="text-center">{{ $item->name_item }}</h5>
              </div>
              <div class="small-box-footer d-flex justify-content-center align-items-center">  
                <button class="btn btn-light">
                  <i class="fas fa-plus"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- ./col --> 
          @empty
          <h1>No Data</h1>
          @endforelse
        </div>
        <!-- /.card-body -->
      </div>
    </div>
      <!-- /.card -->
    </div>
        <div class="col-lg-4 col-12 p-3">
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">POS System</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
          <table id="suppliers-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Item Name</th>
              <th>Sell Price</th>
              <th>Amount</th>
            </tr>
            </thead>
            <tbody>
              @forelse ($inouts as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name_item }}</td>  
                <td>Amount</td>
                <td>{{ $item->item_date }}</td>
                <td>
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
              <th>Item Name</th>
              <th>Sell Price</th>
              <th>Amount</th>
            </tr>
            </tfoot>
          </table>
          <div class="total d-flex flex-column col-12">
            <div class="total-detail d-flex justify-content-between"> 
              <div>
                <h3>Total</h3>
              </div>
              <div>
                <h3>Rp.1.000.000</h3> 
              </div>
            </div>
                    <div class="form-group w-100">
                    <label for="paymentMethod">Payment Method</label>
                    <select name="payment_method" id="idCategory" class="form-control">
                            <option value="cash">Cash</option>
                            <option value="transfer">Transfer</option>
                    </select>
                  </div>
          <button class="btn btn-primary w-100">Checkout</button>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
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
    $("#carts-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#carts-table_wrapper .col-md-6:eq(0)');
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