@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h2>Welcome to MangaPedia!</h2>
                        <p>You are now logged in, welcome to the epicest manga library site of all time!</p>
                        <br>
                        <h2>Verification</h2>
                        <p>To add manga to the site the user must be verified. For one to verify themselves they need
                            to view at least <a href="/manga">two manga</a> on this site. After that the user will
                            be able to add and edit
                            their own manga. A user can check their verification status at any moment on their profile in the dropdown menu.</p>
                        <br>
                        <div>
                            @include('partials.header-hero', ['heroText' => 'Our Proud Owner: '])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
