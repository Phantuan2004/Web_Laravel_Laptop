<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Categories;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        $Products = Admin::paginate(10);
        return view('admin.index', compact('Products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add()
    {
        // Lấy bản ghi từ table categories truyền vào biến
        $categories = Categories::all();
        return view('admin.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('image');
        //Kiểm tra nếu không có ảnh thì rỗng
        $data['image'] = "";

        // Kiểm tra xem có ảnh được tải lên không
        if ($request->hasFile('image')) {
            // Lưu vào public/images
            $path_image = $request->file('image')
                ->store('image', 'public');

            // Cập nhật trường image trong mảng $data với đg dẫn tệp ảnh đã lưu
            $data['image'] = $path_image;
        }
        // Thêm mới sản phẩm vào database
        Admin::create($data);

        // Trả về thông báo thành công
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $id)
    {
        // Hiển thị form chỉnh sửa
        $edit = Categories::all();
        return view('admin.edit', compact('edit', 'id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $id)
    {
        $data = $request->except('image');
        $old_img = $id->image;

        // Nếu có ảnh mới tải lên
        if ($request->hasFile('image')) {
            // Lưu ảnh mới
            $path_img = $request->file('image')
                ->store('image', 'public');
            $data['image'] = $path_img;

            // Xóa ảnh cũ
            if ($old_img && file_exists(storage_path('app/public/' . $old_img))) {
                unlink(storage_path('app/public/' . $old_img));
            }
        } else {
            // Nếu không có ảnh mới thì giữ ảnh cũ
            $data['image'] = $old_img;
        }
        // Cập nhật sản phẩm
        $id->update($data);

        // Trả về thông báo thành công
        return redirect()->back()->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $id)
    {
        // Xóa theo id
        $id->delete();
        // Trả về thông báo thành công
        return redirect()->route('index')->with('message', 'Xóa sản phẩm thành công');
    }

    // Xây dựng phương thức search sản phẩm
    public function search(Request $request)
    {
        // Lấy giá trị từ input search
        $query = $request->input('query');

        // Lấy tất cả sản phẩm có từ khoá
        $pro = Admin::where('name', 'LIKE', "%{$query}%")->paginate();

        // Kiểm tra nếu kết quả trả về rỗng
        if ($pro->isEmpty()) {
            return redirect()->back()->with('message', 'Không tìm thấy sản phẩm nào!');
        }

        // Trả về view hiển thị sản phẩm
        return view('admin.search', compact('pro'));
    }
}
