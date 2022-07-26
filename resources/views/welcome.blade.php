@extends('layout.master')

@section('title')
    {{ __('front.Home') }}
@endsection

@section('content')

<div class="card card-body shadow text-center mt-5 col-md-7 m-auto p-md-4">
    <h1>{{ __('front.laravel task') }}</h1>
    <a href="{{ url('login') }}" class="btn btn-primary rounded-pill col-10 col-md-6 mt-4 m-auto">{{ __('front.Start Now') }}</a>

    <div class="mt-4">
        <p class="lead">
            Name : Hamada Shahat Ali
        </p>
        <a href="https://hamada-shahat.com" class="btn btn-outline-primary rounded-pill col-10 col-md-6 mt-4 m-auto" target="__blank">Portfolio</a>

    </div>
</div>

@endsection
