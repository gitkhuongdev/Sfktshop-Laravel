<?php

    namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\products;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Pagination\Paginator;
    use Illuminate\Support\Arr;
    use Illuminate\Support\Str;
    use Illuminate\Support\Facades\Auth;
    use function Laravel\Prompts\alert;

    Paginator::useBootstrap();

    class SiteController extends Controller
    {
    public function __construct()
    {
        $categoryList = DB::table('categories')
            ->where('status', '=', 1)
            ->orderBy('numericalOrder', 'asc')
            ->get();

            $cartItemCount = 0;
            if (Auth::check()) {
                $userId = Auth::id();
                $cart = session()->get("cart_{$userId}", []);
                $cartItemCount = count($cart);
            }
        \View::share(['categoryList' => $categoryList, 'cartItemCount'=>$cartItemCount]);
    }

    // ==================================Home===============================================
    public function home()
    {
        $categories = DB::table('categories')->pluck('name', 'id');

        $hotProduct = DB::table('products')
            ->where('status', '=', '1')
            ->where('hot', '=', '1')
            ->limit(8)
            ->get();

        $popularProduct = DB::table('products')
            ->where('status', '=', '1')
            ->where('see', '>', '100')
            ->limit(8)
            ->get();

        $newProduct = DB::table('products')
            ->where('status', '=', '1')
            ->orderBy('date', 'desc')
            ->limit(8)
            ->get();

        $data = [
            'hotProduct' => $hotProduct,
            'categories' => $categories,
            'popularProduct' => $popularProduct,
            'newProduct' => $newProduct
        ];

        return view('user/home', $data);
    }

    // ==================================Shop===============================================

    public function shop()
    {
        $perpage = 12;
        $categories = DB::table('categories')->pluck('name', 'id');
        $products = DB::table('products')
            ->where('status', '=', 1)
            ->inRandomOrder()
            ->paginate($perpage)->withQueryString();
        return view('user/shop', ['products' => $products, 'categories' => $categories]);
    }
    // ==================================product by category===============================================

    public function category($id)
    {
        $perpage = 12;
        $category = DB::table('categories')->find($id);
        $categories = DB::table('categories')->pluck('name', 'id');
        $products = DB::table('products')
            ->where('idCategory', $id)
            ->where('status', '=', 1)
            ->inRandomOrder()
            ->paginate($perpage)->withQueryString();
        return view('user/shop', ['products' => $products, 'category' => $category, 'categories' => $categories]);
    }

    // ==================================Detail===============================================

    public function detail($id)
    {
        $product = products::findOrFail($id);

        $categories = DB::table('categories')->pluck('name', 'id');

        $categoryName = DB::table('categories')
            ->where('id', $product->idCategory)
            ->value('name');
        $relatedProducts = DB::table('products')
            ->where('idCategory', $product->idCategory)
            ->where('id', '!=', $id)
            ->where('status', '=', '1')
            ->inRandomOrder()
            ->limit(4)
            ->get();
            
        $listComment = DB::table('comments')
            ->join('users', 'comments.idUser', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name', 'users.avatar as user_avatar')
            ->where('comments.idProduct', $id)
            ->where('comments.status', 1)
            ->orderBy('comments.created_at', 'asc')
            ->get();

        $data = [
            'categories' => $categories,
            'product' => $product,
            'categoryName' => $categoryName,
            'relatedProducts' => $relatedProducts,
            'productId' => $id,
            'listComment'=>$listComment
        ];

        return view('user/detail', $data);
    }

    // //=============================== comment ========================================

    function comments(Request $request){
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to access your cart.');
        }

        $comment = new Comments;
        $comment->idProduct = $request->input('idProduct');
        $comment->idUser = $request->input('idUser');
        $comment->title = $request->input('title');
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->back();
    }

    //==============================CART=====================================================
    public function cart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to access your cart.');
        }

        $userId = Auth::id();
        $cart = $request->session()->get("cart_{$userId}", []);
        $totalPrice = 0;
        $totalQuantity = 0;

        for ($i = 0; $i < count($cart); $i++) {
            $product = $cart[$i];
            $productDetails = DB::table('products')
                ->where('id', $product['id'])
                ->first(['name', 'sale', 'price', 'image_1']);

            $totalAmount = ($productDetails->price - ($productDetails->price * ($productDetails->sale / 100))) * $product['quantity'];
            $totalQuantity += $product['quantity'];
            $totalPrice += $totalAmount;

            $product['name'] = $productDetails->name;
            $product['sale'] = $productDetails->sale;
            $product['price'] = $productDetails->price;
            $product['image_1'] = $productDetails->image_1;
            $cart[$i] = $product;
        }

        $request->session()->put("cart_{$userId}", $cart);
        return view('user/cart')->with(compact('cart', 'totalPrice', 'totalQuantity'));
    }

    public function addToCart(Request $request, $id = 0)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to add items to your cart.');
        }

        $userId = Auth::id();
        $quantity = $request->input('quantity', 1);

        $cart = $request->session()->get("cart_{$userId}", []);
        $index = array_search($id, array_column($cart, 'id'));

        if ($index !== false) {
            $cart[$index]['quantity'] += $quantity;
        } else {
            $cart[] = ['id' => $id, 'quantity' => $quantity];
        }

        $request->session()->put("cart_{$userId}", $cart);
        return redirect('/');
    }

    public function deleteCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to delete items from your cart.');
        }

        $userId = Auth::id();
        $cart = $request->session()->get("cart_{$userId}", []);
        $index = array_search($id, array_column($cart, 'id'));

        if ($index !== false) {
            array_splice($cart, $index, 1);
            $request->session()->put("cart_{$userId}", $cart);
        }

        return redirect('cart');
    }

    public function clearCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to clear your cart.');
        }

        $userId = Auth::id();
        $request->session()->forget("cart_{$userId}");
        return redirect('cart');
    }

    public function updateCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to update your cart.');
        }

        $userId = Auth::id();
        $quantity = $request->input('quantity', 1);
        $cart = $request->session()->get("cart_{$userId}", []);
        $index = array_search($id, array_column($cart, 'id'));

        if ($index !== false) {
            $cart[$index]['quantity'] = $quantity;
            $request->session()->put("cart_{$userId}", $cart);
        }

        return redirect('cart');
    }

    // ===============================Check out========================================
    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('warn', 'You need to log in to access the checkout.');
        }
    
        $userId = Auth::id();
        $cart = $request->session()->get("cart_{$userId}", []);
        $user = auth()->user(); 
        
        return view('user.checkout', compact('cart', 'user'));
    }

    public function handleCheckout(Request $request){
        $validatedData = $request->validate([
            'user_fullname' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:20',
            'user_note' => 'nullable|string|max:1000',
            'user_address' => 'required|string|max:500',
        ]);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->user_fullname = $validatedData['user_fullname'];
        $order->user_email = $validatedData['user_email'];
        $order->user_phone = $validatedData['user_phone'];
        $order->user_note = $validatedData['user_note'];
        $order->user_address = $validatedData['user_address'];
        $order->total_money = 0;
        $order->total_quantity = 0;
        $order->save();

        $userId = Auth::id();
        $cart = $request->session()->get("cart_{$userId}", []);

        foreach ($cart as $item) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $item['id'];  // Access array elements correctly
            $order_detail->quantity = $item['quantity'];
            $order_detail->price = is_null($item['sale']) ? $item['price'] : ($item['price'] - ($item['price'] * ($item['sale'] / 100)));
            $order_detail->save();

            $order->total_money += $order_detail->quantity * $order_detail->price;
            $order->total_quantity += $order_detail->quantity;
        }
    
        $order->save();
    

    
        $request->session()->forget("cart_{$userId}");
        return redirect('/');
    }

    //====================================Search=========================================


    }
    