<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
Paginator::useBootstrap();
class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $per_page = 20;

        $idCategory = -1;
    if ($request->has('idCategory')) $idCategory = (int) $request['idCategory'];
    $perpage = env('PER_PAGE');
    if ($idCategory>0){
        $listProduct = Products::orderBy('id','desc')->where('idCategory', $idCategory)
        ->paginate($perpage)->withQueryString();
    } else {
        $listProduct = Products::orderBy('id','desc')
        ->paginate($perpage)->withQueryString();
    }
    $listCategory = Categories::all();
    return view('admin/listProduct',compact(['idCategory','listProduct','listCategory']));
        
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin/addProduct', ['categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $product = new Products;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->sale = $request->input('sale');
        $product->description = $request->input('description');
        $product->status = $request->input('status');
        $product->color = $request->input('color');
        $product->hot = $request->input('hot');
        $product->image_1 = $request->input('image_1');
        $product->image_2 = $request->input('image_2');
        $product->image_3 = $request->input('image_3');
        $product->idCategory = $request->input('idCategory');


           // Lưu hình ảnh và lấy đường dẫn
    if ($request->hasFile('image_1')) {
        $image1 = $request->file('image_1');
        $image1Path = $image1->getClientOriginalName();
        $image1->move(public_path('uploads'), $image1Path);
        $product->image_1 = '/uploads/' . $image1Path;
    }

    if ($request->hasFile('image_2')) {
        $image2 = $request->file('image_2');
        $image2Path = $image2->getClientOriginalName();
        $image2->move(public_path('uploads'), $image2Path);
        $product->image_2 = '/uploads/' . $image2Path;
    }

    if ($request->hasFile('image_3')) {
        $image3 = $request->file('image_3');
        $image3Path = $image3->getClientOriginalName();
        $image3->move(public_path('uploads'), $image3Path);
        $product->image_3 = '/uploads/' . $image3Path;
    }
        $product->save();
        return redirect(route('products.index'));

    }


    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $product = Products::find($id);
        $categories = Categories::all();
        if ($product == null) return redirect('/alert');
        return view('admin/updateProduct', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Products::find($id);

        // Update product details
        $product->name = $request['name'];
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->sale = $request['sale'];
        $product->description = $request['description'];
        $product->status = $request['status'];
        $product->color = $request['color'];
        $product->hot = $request['hot'];
        $product->idCategory = $request['idCategory'];
    
        // Handle image uploads
        if (isset($_FILES['image_1']) && $_FILES['image_1']['error'] == UPLOAD_ERR_OK) {
            $image1 = $_FILES['image_1'];
            $image1Path = $image1['name'];
            move_uploaded_file($image1['tmp_name'], public_path('uploads') . '/' . $image1Path);
            $product->image_1 = '/uploads/' . $image1Path;
        }
    
        if (isset($_FILES['image_2']) && $_FILES['image_2']['error'] == UPLOAD_ERR_OK) {
            $image2 = $_FILES['image_2'];
            $image2Path = $image2['name'];
            move_uploaded_file($image2['tmp_name'], public_path('uploads') . '/' . $image2Path);
            $product->image_2 = '/uploads/' . $image2Path;
        }
    
        if (isset($_FILES['image_3']) && $_FILES['image_3']['error'] == UPLOAD_ERR_OK) {
            $image3 = $_FILES['image_3'];
            $image3Path = $image3['name'];
            move_uploaded_file($image3['tmp_name'], public_path('uploads') . '/' . $image3Path);
            $product->image_3 = '/uploads/' . $image3Path;
        }
    
        $product->save();
    
        return redirect(route('products.index'));

    }

    public function destroy(string $id)
    {
        $product = Products::find($id);
        if ($product == null) {
            return redirect('/alert');
        }
        $product->delete();
        return redirect()->route('products.index');
    }
}