<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


Paginator::useBootstrap();
class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCategories = DB::table("categories")
            ->orderBy('id')
            ->get();
        return view('admin/listCategories',['listCategories'=>$listCategories]);
    }


    public function create()
    {
        return view('admin/addCategory');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:categories,name',
            'status' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $maxOrder = categories::max('numericalOrder');
        $nextOrder = $maxOrder ? $maxOrder + 1 : 1;

        $category = new categories;
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->numericalOrder = $nextOrder;
        $category->save();

        return redirect(route('category.index'))->with('alert', 'Create Success');
    }

        public function show(string $id)
    {
        
    }


    public function edit(string $id)
    {
        $category = categories::find($id);
        if($category==null)return redirect('/alert');
        return view('admin/updateCategories',['category'=>$category]);
    }


    public function update(Request $request, string $id)
    {
        $category = categories::find($id);
        if($category==null)return redirect('/alert');
        $category->name = $request['name'];
        $category->status = $request['status'];
        $category->save();
        return redirect(route('category.index'))->with('alert', 'Update Success');
    }


    public function destroy(string $id)
    {
        $countProducts = DB::table('products')->where('idCategory', $id)->count();
         if($countProducts > 0){
            return redirect(route('category.index'))->with('alert', 'You can not delete this category!');
         }
        $category = Categories::find($id);
        if($category == null) return redirect('/alert');
        $category->delete();
        return redirect(route('category.index'))->with('alert', 'Delete Success');
    }
}