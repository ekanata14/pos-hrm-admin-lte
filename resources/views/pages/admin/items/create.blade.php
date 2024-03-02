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
                <h3 class="card-title">Add Items</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route("items.create.perform") }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="itemName">Item Name</label>
                    <input type="text" class="form-control" id="itemName" placeholder="Enter Item Name" name="name_item">
                  </div>
                  <div class="form-group">
                    <label for="basePriceItem">Base Price Item</label>
                    <input type="number" class="form-control" id="basePriceItem" placeholder="Enter Base Price Item" name="base_price_item">
                  </div>
                  <div class="form-group">
                    <label for="sellPriceItem">Sell Price Item</label>
                    <input type="number" class="form-control" id="sellPriceItem" placeholder="Enter Email" name="sell_price_item">
                  </div>
                    <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select name="id_supplier" id="idSupplier" class="form-control">
                      @foreach ($suppliers as $supplier)
                          <option value="{{ $supplier->id_supplier }}">{{ $supplier->name_supplier }}</option> 
                      @endforeach
                    </select>
                  </div>
                    <div class="form-group">
                    <label for="category">Category</label>
                    <select name="id_category" id="idCategory" class="form-control">
                      @foreach ($categories as $category)
                          <option value="{{ $category->id_category }}">{{ $category->name_category }}</option> 
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
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