 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion rtl_sidebar" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard') }}">
         <div class="sidebar-brand-icon rotate-n-15">
             {{-- <i class="fas fa-laugh-wink"></i> --}}

         </div>
         <div class="sidebar-brand-text mx-3">{{ __('front.laravel task') }}</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
         <a class="nav-link" href="{{ url('/dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>{{ __('front.dashboard') }}</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">


     <!-- Nav Item - categories -->
     <li
         class="nav-item {{ Request::is('categories') ? 'active' : '' }}  {{ auth()->user()->role != 'admin' ? 'd-none' : '' }} ">
         <a class="nav-link" href="{{ url('categories') }}">

             <span>{{ __('front.categories') }}</span></a>
     </li>

     <li
         class="nav-item {{ Request::is('products') ? 'active' : '' }}  {{ auth()->user()->role != 'admin' ? 'd-none' : '' }} ">
         <a class="nav-link" href="{{ url('products') }}">

             <span>{{ __('front.products') }}</span></a>
     </li>



     <li class="nav-item">

         <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

             <span>{{ __('front.logout') }}</span>
         </a>

         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
             @csrf
         </form>

     </li>


     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>
 </ul>
