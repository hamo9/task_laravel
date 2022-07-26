@extends('layout.master_admin')
@section('title')
{{ __('front.edit product') }}
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card card-body shadow">
            <h2>{{ __('front.edit product') }}</h2>
            <hr>
            <form method="POST" action="{{ url('products/update', $products->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6">

                        <div class="mt-3">
                            <label for="">{{ __('front.name') }}</label>
                            <input type="text" name="name" id="" class="form-control" required value="{{ $products->name}}">
                        </div>

                        <div class="mt-3">
                            <label for="">{{ __('front.category') }}</label>
                            <select name="category" id="" class="form-control" required >
                                @foreach ($categories as $item)
                                    <option {{ $products->category_id == $item->id ? 'selected' : '';  }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <div class="mt-3">
                            <label for="">{{ __('front.description') }}</label>
                            <textarea type="text" name="description" id="" class="form-control" required rows="8" cols="7" >{{ $products->description}}</textarea>
                        </div>

                    </div>

                    <div class="col-md-6 mt-3">

                        <div class="mt-3 d-none d-md-block text-center">
                            <img src="{{ $products->image}}" class="rounded-pill m-auto" width="300px" height="300px" alt="img product">
                        </div>

                        <div class="mt-2">
                            <label for="">{{ __('front.image') }}</label>
                            <input type="file" name="image" id="" class="form-control" >
                        </div>

                    </div>


                </div>
                <button class="btn btn-primary mt-5">{{ __('front.Add') }}</button>
                <a href="{{ url('/products') }}" class="btn btn-secondary mt-5 ml-2">{{ __('front.Back') }}</a>
            </form>
        </div>

    </div>
@endsection


