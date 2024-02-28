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
    <div style="height: 750px" class="d-flex flex-column justify-content-center align-items-center pt-5">
        <h1 class="text-center bg-red">The System is being developed, will be online soon, stay tune</h1>
        <div class="tenor-gif-embed w-50" data-postid="9761231469134912892" data-share-method="host" data-aspect-ratio="1.25758"><a href="https://tenor.com/view/gojo-satoru-gojo-you-cryin-gif-9761231469134912892">Gojo Satoru Gojo GIF</a>from <a href="https://tenor.com/search/gojo-gifs">Gojo GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
        <h3>You can see your profile here</h3>
        <a href="{{ route('profiles.index') }}" class="btn btn-primary">Your Profile</a>
    </div>
    <!-- /.content -->

@endsection