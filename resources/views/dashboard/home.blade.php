@extends('dashboard.master')
@section('title', 'dashboard')
@section('nav')
    @include('dashboard.nav')
@endsection
@section('page', 'Dashboard')
@section('main')

    <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent justify-content-end">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navigation">
                @include('dashboard.main')
            </div>
        </div>    
    </nav>
    
    @include('dashboard.dashboard')
@endsection