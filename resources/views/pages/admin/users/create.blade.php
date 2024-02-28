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
                <h3 class="card-title">Add User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route("users.create.perform") }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group">
                    <label for="username">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter Address" class="form-control"></textarea>
                  </div> 
                  <div class="form-group">
                    <label for="username">Phone Number</label>
                    <input type="number" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phone_number">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="id_role" id="idRole" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">User</option>
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
    $("#users-table").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#users-table_wrapper .col-md-6:eq(0)');
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