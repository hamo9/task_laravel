@extends('layout.master_admin')
@section('title')
{{ __('front.products') }}
@endsection

@section('style')
    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <div class="card card-body my-3">
            <h1 class="h3 mb-4">{{ __('front.filter product by name or category') }}</h1>
            <form action="{{ url('products/filter') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-9">
                        <input type="text" name="search" id="" class="form-control" placeholder="{{ __('front.name or category here') }}">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-secondary">{{ __('front.Filter') }}</button>
                    </div>
                </div>

            </form>

        </div>

        <!-- DataTales Example -->

        <div class="rtl_text_right">
            <a href="{{ url('products/create') }}" class="btn btn-success mb-2">{{ __("front.Add product") }}</a>

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('front.All products') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php $number = 0; ?> # </th>

                                <th>{{ __('front.image') }}</th>
                                <th>{{ __('front.name') }}</th>
                                <th>{{ __('front.description') }}</th>
                                <th>{{ __('front.category') }}</th>

                                <th class="">{{ __('front.manage') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item )
                                <tr>
                                    <td>{{ ++$number}}</td>

                                    <td>
                                        <img src="{{ $item->image}}" class="rounded-pill" width="90px" height="90px" alt="img product">
                                    </td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->description}}</td>
                                    <td>{{ $item->Category->name}}</td>
                                    <td>
                                        <a href="{{ url('products/edit', $item->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('products/destroy', $item->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>
@endsection
