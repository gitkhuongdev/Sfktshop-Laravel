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


class AdminController extends Controller
{
    public function admin(){
        $categoryCount = Categories::count();
        $productCount = Products::count();
        $orderCount = Order::count();
        $commentCount = Comments::count();
        $revenue = Order::where('status', 'success')->sum('total_money');
        return view("admin/dashboard", compact("categoryCount", "productCount",'orderCount','commentCount','revenue'));
    }
// ===========================================ADMIN-USER======================================
    function login(){
        return view('admin/login');
    }

    public function handleLogin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            $user = Auth::guard('admin')->user();
            if ($user->role == 1) {
                return redirect('admin')->with('success', 'Welcome to Dashboard!'); 
            } else {
                return back()->with('warn', 'You are not authorized');
            }
        } else {
            return back()->with('error', 'Email or Password is incorrect.');
        }
    }
    function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login')->with('success', 'Logout success!');
    }

    // =================================Comment=============================================

    public function listComment()
    {
        $per_page = 20;
        $comments = Comments::select('comments.*', 'users.name as user_name')
            ->join('users', 'comments.idUser', '=', 'users.id')
            ->orderBy('created_at','desc')
            ->paginate($per_page);
        return view('admin/listComment', ['comments' => $comments]);
    }

    public function deleteComment($id)
{
    $comment = Comments::findOrFail($id);
    $comment->delete();
    return redirect('comments');
}
}