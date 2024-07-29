<div>
    @extends('layout.admin')
    @section('content')
        <div class="container">
            <div class="card">
                <h1 class="card-header">Cập nhật sản phẩm</h1>

                <div>
                    @if (session('message'))
                        <div class="alert alert-success mt-2">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <form action="{{ route('edit', $id) }}" method="POST" enctype="multipart/form-data">
                        {{-- Cơ chế bảo mật của laravel --}}
                        @csrf
                        {{-- Sử dụng phương thức post để giả lập put --}}
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $id->id }}">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $id->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh mô tả</label> <br>
                            <input id="fileImage" type="file" name="image" id="image" value="{{ $id->image }}">
                            <img id="img" src="{{ asset('storage/' . $id->image) }}" alt="{{ $id->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Giá sản phẩm</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ $id->price }}">
                        </div>
                        <div class="form-group">
                            <label for="">Số lượng</label>
                            <input type="input" name="quantity" id="quantity" class="form-control"
                                value="{{ $id->quantity }}">
                        </div>
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <input type="text" name="mota" id="mota" class="form-control"
                                value="{{ $id->mota }}">
                        </div>
                        <div class="form-group">
                            <label for="">Phân loại</label>
                            <select name="category_id" id="category_id">
                                @foreach ($edit as $category)
                                    <option value="{{ $category->id }}" @if ($category->id === $id->category_id) selected @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-success" type="submit">Cập nhật</button>
                            <button class="btn btn-warning" type="reset">Nhập lại</button>
                            <a href="{{ route('index') }}" class="btn btn-primary">Danh sách</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            var file_img = document.querySelector('#fileImage');
            var img = document.querySelector('#img');

            // Khi thay đổi file ảnh
            file_img.addEventListener('change', function(event) {
                event.preventDefault();
                img.src = URL.createObjectURL(this.files[0])
            })
        </script>
    @endsection
</div>
