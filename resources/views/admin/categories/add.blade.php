@extends('layout.master_admin')
@section('title')
{{ __('front.Add category') }}
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>{{ __('front.Add category') }}</h2>
            <hr>
            <form method="POST" action="{{ url('categories/store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="mt-2 col-md-6">
                        <label for="">{{ __('front.name') }}</label>
                        <input type="text" name="name" id="" class="form-control" required >
                    </div>

                </div>
                <button class="btn btn-primary mt-4">{{ __('front.Add') }}</button>
                <a href="{{ url('/categories') }}" class="btn btn-secondary mt-4 ml-2">{{ __('front.Back') }}</a>
            </form>
        </div>

    </div>
@endsection


