<div>
    @extends('layout.admin')
    @section('content')
        <div class="container">
            <div class="card">
                <h1 class="card-header">Thêm mới sản phẩm</h1>

                <div>
                    @if (session('message'))
                        <div class="alert alert-success mt-2">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
                        {{-- Cơ chế bảo mật của laravel --}}
                        @csrf

                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh mô tả</label> <br>
                            <input type="file" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="input" name="quantity" id="quantity" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="mota" id="mota" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phân loại</label>
                            <select name="category_id" id="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Lượt xem</label>
                            <input type="text" name="views" id="views" class="form-control">
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">Thêm mới</button>
                            <button class="btn btn-warning" type="reset">Nhập lại</button>
                            <a href="{{ route('index') }}" class="btn btn-primary">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
</div>
