@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1 class="text-center">{{ __('Profile') }}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                       You are logged as <strong>{{ $user->name }}</strong>, your email: <strong>{{ $user->email }}</strong>
                            <br>
                            User role:
                            @if ($user->isAdmin === 1)
                                <strong>Admin</strong>
                            @else
                                <strong>User</strong>
                            @endif
                            <div class="avatar">
                                <img src="{{ asset('uploads/avatars/'.$user->avatar) }}" alt="" id="avatar-img" width="100px" height="100px">
                                <form class="upload-avatar-img" method="POST" action="{{ route('user/profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <label for="avatar" id="choose-file">
                                        <i class="fas fa-camera"></i>
                                        <span>Choose file</span>
                                        <input id="avatar" type="file" name="avatar">
                                    </label>
                                    <div id="buttons">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check">Submit</i></button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
