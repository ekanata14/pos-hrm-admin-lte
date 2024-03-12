@extends('layouts.admin')

@section('content')
    @if (Auth::user()->id_role == 1)
    <!-- Content Header (Page header) -->
        @include('components.contentHeader')
    <!-- /.content-header -->

    <!-- Card -->
        @include('components.cards') 
    <!-- /.card -->
        
    @endif

    <!-- Main content -->
        <h1>Haha Got It!</h1>
    <!-- /.content -->

@endsection