<div>
    @extends('layout.user')
    @section('content')
        <div class="list_product mt-5">
            <h1 id="scroll-target">Danh sách sản phẩm tìm kiếm</h1> <br>
            <div>
                {{ $pro->links('pagination::bootstrap-5') }}
            </div>

            <div class="row">
                @foreach ($pro as $list)
                    <div class="product card mb-5">
                        <div class="product-img card-img-top">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}">
                                <img src="{{ Str::startsWith($list->image, 'http') ? $list->image : asset('/storage/' . $list->image) }}"
                                    alt="{{ $list->name }}" class="img-fluid" style="width:100px">
                            </a>
                        </div>
                        <div class="product-name card-body">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}">
                                <h2>{{ $list->name }}</h2>
                            </a>
                        </div>
                        <div class="product-price card-body">
                            <div class="m1">
                                <h4>{{ $list->price }} $</h4>
                            </div>
                            <div class="m2">
                                <a href="#"><i class="fa-solid fa-cart-shopping" style="color: black"></i></a>
                                <a href="#"><i class="fa-solid fa-heart"></i></a>
                            </div>
                        </div>
                        <div class="product_detail">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}"><i
                                    class="fa-solid fa-magnifying-glass"></i>Chi tiết</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection
</div>
