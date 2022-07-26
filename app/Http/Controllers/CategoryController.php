<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // -----------------------------------------------------------------------
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.categories.index',compact('categories'));
    }

    // -----------------------------------------------------------------------
    public function create()
    {
        return view('admin.categories.add');
    }

    // -----------------------------------------------------------------------
    public function store(Request $request)
    {

        DB::table('categories')->insert([
            'name' => $request->name
        ]);

        return redirect('categories')->with('success', 'Created successfully!');
    }

    // -----------------------------------------------------------------------
    public function edit($id)
    {
        $category = DB::table('categories')->where('id',$id);
        if ($category) {
            $category =  $category->first();
            return view('admin.categories.edit',compact('category'));
        }else {
            return redirect()->back();
        }
    }


    // -----------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $category = DB::table('categories')->where('id',$id);
        if ($category) {
            $category->update([
                'name' => $request->name
            ]);
            return redirect('categories')->with('success', 'updated successfully!');
        }else {
            return redirect()->back()->with('error', 'category not found');
        }
    }

    // -----------------------------------------------------------------------
    public function destroy($id)
    {
        $category = DB::table('categories')->where('id',$id);
        if ($category) {
            $category->delete();
            return redirect('categories')->with('success', 'deleted successfully!');
        }else {
            return redirect()->back()->with('error', 'category not found');
        }
    }
}
