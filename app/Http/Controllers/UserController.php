<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Categories;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Sản phẩm có giá ưu đãi
        $random1 = DB::table('products')
            ->select('products.*')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        // Sản phẩm mới nhất
        $random2 = DB::table('products')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('user.home', compact('random1', 'random2'));
    }

    public function ListProducts()
    {
        // Sản phẩm có giá ưu đãi
        $min = DB::table('products')
            ->select('products.*')
            ->orderBy('price', 'asc')
            ->limit(8)
            ->get();

        // Sản phẩm cao cấp
        $max = DB::table('products')
            ->orderBy('price', 'desc')
            ->limit(8)
            ->get();

        return view('user.list', compact('min', 'max'));
    }

    // Sản phẩm theo danh mục
    public function ProByCate($id)
    {
        //*TODO: Danh sách sản phẩm theo danh mục
        $ProByCate = DB::table('products')
            ->where('category_id', $id)
            ->get();

        return view('user.ProByCate', compact('ProByCate'));
    }

    public function DetailProducts($id)
    {
        $detail = DB::table('products')->where('id', $id)->first();

        // Sản phẩm liên quan
        $random = DB::table('products')
            ->inRandomOrder()
            ->limit(4)
            ->get();
        return view('user.detail', compact('detail', 'random'));
    }

    // Xây dựng phương thức search sản phẩm
    public function SearchUser(Request $request)
    {
        // Lấy giá trị từ input search
        $query = $request->input('query');

        // Lấy tất cả sản phẩm có từ khoá và phân trang
        $pro = Admin::where('name', 'LIKE', "%{$query}%")->paginate(12);

        // Kiểm tra nếu kết quả trả về rỗng
        if ($pro->isEmpty()) {
            // Chuyển hướng về trang chủ và hiển thị thông báo
            return redirect()->route('home')->with('message', 'Không tìm thấy sản phẩm nào!');
        }

        // Trả về view hiển thị sản phẩm
        return view('user.Search', compact('pro'));
    }
}
