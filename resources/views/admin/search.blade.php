<style>
    a,
    button {
        width: 5rem;
        height: 3rem;
    }

    .add {
        text-align: right;
    }

    .add a {
        width: 100px;
        height: 41px;
    }

    .form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .form button {
        width: 100px;
        height: 35px;
        margin-bottom: 1px;
    }

    .form input {
        width: 70%;
        height: 35px;
        border-radius: 5px;
        border: 1px solid;
        margin-right: 2px;
    }

    td a,
    td button {
        width: 70px;
        height: 38px;
        margin: 2px;
    }

    .nutbam button,
    .nutbam a {
        width: 99px;
        height: 38px;
    }
</style>

{{-- extends: chỉ định layout được sử dụng --}}
@extends('layout.admin')

{{-- section: định nghĩa nội dung của section --}}
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Danh sách từ khóa tìm kiếm</h1>
        <div>
            <form class="form" action="{{ route('search') }}" method="GET">
                <input type="text" name="query" placeholder="Tìm kiếm sản phẩm">
                <button class="btn btn-danger">Tìm kiếm</button>
            </form>
        </div>

        <div>
            {{ $pro->links('pagination::bootstrap-5') }}
        </div>

        <div>
            @if (session('message'))
                <div class="alert alert-success mt-2">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <table border="1" class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Ảnh mô tả</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pro as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->name }}</td>
                        <td>
                            <img src="{{ asset('/storage/' . $book->image) }}" alt="{{ $book->name }}" class="img-fluid"
                                style="width:100px">
                        </td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->quantity }}</td>
                        <td>{{ $book->mota }}</td>
                        <td>{{ $book->categories->name }}</td>
                        <td class="d-flex justify-content-center align-content-center">
                            <a href="{{ route('edit', $book->id) }}" class="btn btn-dark">Sửa</a>
                            {{-- Chức năng xóa cần sử dụng form --}}
                            <form action="{{ route('destroy', $book->id) }}" method="POST">
                                {{-- Sử dụng @csrf trong các form gửi dữ liệu để tránh tấn công bảo mật --}}
                                @csrf
                                {{-- Sử dụng phương thức POST để giả lập các phương thức như PUT PATCH và DELETE --}}
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa')"
                                    class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="nutbam">
            <button class="btn btn-success" type="submit">Thêm mới</button>
            <button class="btn btn-warning" type="reset">Nhập lại</button>
            <a href="{{ route('index') }}" class="btn btn-primary">Danh sách</a>
        </div>
    </div>
@endsection
