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
            <div class="card card-warning2">
              <div class="card-header">
                <h3 class="card-title">Edit Users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('users.edit.perform', $user->id_user) }}" method="POST">
                @csrf 
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id_user" value="{{ $user->id_user }}">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" value="{{ $user->username }}">
                  </div>
                  <div class="form-group">
                    <label for="username">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $user->name }}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{ $user->email }}">
                  </div>
                  <div class="form-group">
                    <label for="username">Address</label>
                    <textarea name="address" id="address" cols="30" rows="10" placeholder="Enter Address" class="form-control">{{ $user->address }}</textarea>
                  </div> 
                  <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phone_number" value="{{ $user->phone_number }}">
                  </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Role</label>
                    <select name="id_role" id="idRole" class="form-control">
                        @forelse ($roles as $role)
                            @if ($user->id_role == $role->id_role)
                                <option value="{{ $role->id_role }}">{{ $role->name_role }}</option> 
                            @else
                                <option value="{{ $role->id_role }}">{{ $role->name_role }}</option> 
                            @endif
                        @empty
                            <p>There are no roles at this moment</p>
                        @endforelse
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer d-flex justify-content-end">
                  <button type="submit" class="btn btn-warning">Submit</button>
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