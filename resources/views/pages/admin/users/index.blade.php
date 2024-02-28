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
            <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="users-table" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Name(s)</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Role</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->name_role }}</td>
                <td>
                    <a href="https://wa.me/62{{ $user->phone_number }}" class="btn btn-success">Whatsapp</a>
                    <a href="{{ route('users.edit', $user->id_user) }}" class="btn btn-warning">Edit</a> 
                    <form action="{{ route('users.delete.perform', $user->id_user) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <input type="hidden" value="{{ $user->id_user }}" name="id_user">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
                    
                @endforeach
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>Username</th>
              <th>Name(s)</th>
              <th>Email</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Role</th>
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