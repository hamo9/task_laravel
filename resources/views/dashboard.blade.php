@extends('layout.master_admin')
@section('title')
    {{ __('home.dashboard') }}
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('front.dashboard') }}</h1>

        </div>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                    {{ __('front.categories') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_categories }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    {{ __('front.products') }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $count_products }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Content Row -->


    </div>
@endsection

@section('script')
 <!-- Page level plugins -->
 <script src="admin/vendor/chart.js/Chart.min.js"></script>

 {{-- <!-- Page level custom scripts -->
 <script src="admin/js/demo/chart-area-demo.js"></script> --}}
 {{-- <script src="admin/js/demo/chart-bar-demo.js"></script> --}}

 {{-- <script src="admin/js/demo/chart-pie-demo.js"></script> --}}



@endsection
