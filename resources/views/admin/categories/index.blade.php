@extends('layout.master_admin')
@section('title')
{{ __('front.categories') }}
@endsection

@section('style')
    <!-- Custom styles for this page -->
    <link href="admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">

        <!-- DataTales Example -->

        <div class="rtl_text_right">
            <a href="{{ url('categories/create') }}" class="btn btn-success mb-2">{{ __("front.Add category") }}</a>

        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('front.All categories') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><?php $number = 0; ?> # </th>

                                <th>{{ __('front.name') }}</th>
                                <th class="">{{ __('front.manage') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item )
                                <tr>
                                    <td>{{ ++$number}}</td>

                                    <td>{{ $item->name}}</td>
                                    <td>
                                        <a href="{{ url('categories/edit', $item->id) }}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                        <a href="{{ url('categories/destroy', $item->id) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>

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
