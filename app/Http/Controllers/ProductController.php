<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    // -----------------------------------------------------------------------
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index',compact('products'));
    }

    // -----------------------------------------------------------------------
    public function create()
    {
        $categories = DB::table('categories')->get();

        return view('admin.products.add',compact('categories'));
    }

    // -----------------------------------------------------------------------
    public function store(Request $request)
    {

        $ar_ex =  array('png', 'jpg', 'jpeg', 'JPG','JPEG','PNG');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '.' . $extintion;
                $file->move('admin/img/upload/', $filename);


                DB::table('products')->insert([
                    'name' => $request->name,
                    'image' => '/admin/img/upload/' . $filename,
                    'description' => $request->description,
                    'category_id' => $request->category,
                ]);

            } else {
                return redirect()->back()->with('error', 'please choose a valie image.');
            }
            return redirect('products')->with('success', 'Created successfully!');
        }




    }


   // -----------------------------------------------------------------------
    public function edit($id)
    {
        $products = DB::table('products')->where('id',$id);
        $categories = DB::table('categories')->get();

        if ($products) {
            $products =  $products->first();
            return view('admin.products.edit',compact('products','categories'));
        }else {
            return redirect()->back();
        }
    }

    // -----------------------------------------------------------------------
    public function update(Request $request, $id)
    {
        $ar_ex =  array('png', 'jpg', 'jpeg', 'JPG','JPEG','PNG');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extintion = $file->getClientOriginalExtension();

            if (in_array($extintion, $ar_ex)) {
                $filename = time() . '.' . $extintion;
                $file->move('admin/img/upload/', $filename);


                DB::table('products')->where('id',$id)->update([
                    'name' => $request->name,
                    'image' => '/admin/img/upload/' . $filename,
                    'description' => $request->description,
                    'category_id' => $request->category,
                ]);

            } else {
                return redirect()->back()->with('error', 'please choose a valie image.');
            }
            return redirect('products')->with('success', 'Created successfully!');
        }else {
            DB::table('products')->where('id',$id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'category_id' => $request->category,
            ]);
            return redirect('products')->with('success', 'Created successfully!');
        }
    }

   // -----------------------------------------------------------------------
    public function destroy($id)
    {
        $products = DB::table('products')->where('id',$id);
        if ($products) {
            $products->delete();
            return redirect('products')->with('success', 'deleted successfully!');
        }else {
            return redirect()->back()->with('error', 'product not found');
        }
    }

    // -----------------------------------------------------------------------
    public function filterProduct(Request $request)
    {

        $search = $request;

        $products = Product::Filter($search)->get();
        

        if ($products->count() > 0) {
            return view('admin.products.index',compact('products'));
        }else {

            $category = Category::select('id')->Filter($search)->get();

            $products = Product::whereIn('category_id',$category)->get();
            return view('admin.products.index',compact('products'));

        }



    }
}
