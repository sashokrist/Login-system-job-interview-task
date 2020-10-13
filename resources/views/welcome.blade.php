@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                            <div class="alert alert-success" role="alert">
                                <a href="{{ route('register') }}" class="btn btn-primary underline">Register</a>
                                <a href="{{ route('login-email') }}" class="btn btn-primary underline">Login</a>
                                <a href="{{ route('admin') }}" class="btn btn-primary underline">Admin</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
