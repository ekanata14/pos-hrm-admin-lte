@extends('layouts.admin')

@section('content')
    <!-- Main content -->

<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
          <div class="profile-container d-flex flex-column align-items-center">
        <div class="image">
          <img src="{{ asset('AdminLTE-3.2.0/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
          <h1 class="text-center">{{ $user[0]->name }}</h1>
          <h2 class="text-center">{{ $user[0]->email }}</h2>
 
          </div>
   {{-- <div class="card"> --}}
        {{-- <div class="card-header">
          <h3 class="card-title">DataTable with default features</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
        <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Your Profile</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('users.edit.perform', $user[0]->id_user) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id_user" value="{{ $user[0]->id_user }}">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ $user[0]->username }}">
                  </div>
                  <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $user[0]->name }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $user[0]->email }}">
                  </div>
                  <div class="form-group">
                    <label for="username">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter Address" class="form-control">{{ $user[0]->address }}</textarea>
                  </div> 
                  <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phone_number" value="{{ $user[0]->phone_number }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <button type="submit" class="btn btn-warning">Edit</button>
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