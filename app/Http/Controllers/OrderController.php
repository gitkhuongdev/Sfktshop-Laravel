<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use DB;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

Paginator::useBootstrap();



class OrderController extends Controller
{
    public function listOrder()
    {
        $per_page = 20;
        $listOrder = Order::orderBy('created_at', 'desc')->paginate($per_page);
        return view('admin.listOrder', ['listOrder' => $listOrder]);
    }

    public function editOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.updateOrder', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect('admin/orders');
    }

}