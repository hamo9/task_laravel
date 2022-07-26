<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $count_products = DB::table('products')->get()->count();
        $count_categories = DB::table('categories')->get()->count();

        return view('dashboard',compact('count_products','count_categories'));
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $local = session()->get('locale');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        session()->put('locale', $local);
        return redirect('/');
    }

}
