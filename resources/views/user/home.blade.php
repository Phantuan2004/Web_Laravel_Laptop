<div>
    @extends('layout.user')
    @section('content')
        <div class="list_product mt-5 mb-5">
            <h1>Sản phẩm Hot</h1>
            <div class="row">
                @foreach ($random1 as $list)
                    <div class="product card mb-5">
                        <div class="product-img card-img-top">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}"><img
                                    src="{{ Str::startsWith($list->image, 'http') ? $list->image : asset('/storage/' . $list->image) }}"
                                    alt="{{ $list->name }}" class="img-fluid"></a>
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
            <button class="btn btn-danger"><a href="{{ route('ListProducts') }}">Xem
                    thêm</a></button>
        </div>

        <div class="list_product container mt-5 mb-5">
            <h1>Hàng mới về</h1>
            <div class="row">
                <div class="row_image d-flex">
                    <img class="mb-1" src="{{ asset('img/img.png') }}" alt="">
                    <img src="{{ asset('img/img2.png') }}" alt="">
                </div>
                <div class="col d-flex justify-content-center">
                    @foreach ($random2 as $list)
                        <div class="row_product">
                            <div class="product d-flex card mb-5">
                                <div class="product-img card-img-top">
                                    <a href="{{ route('DetailProducts', ['id' => $list->id]) }}"><img
                                            src="{{ Str::startsWith($list->image, 'http') ? $list->image : asset('/storage/' . $list->image) }}"
                                            alt="{{ $list->name }}" class="img-fluid"></a>
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
                        </div>
                    @endforeach
                </div>
            </div>
            <button class="btn btn-danger"><a href="{{ route('ListProducts') }}">Xem
                    thêm</a>
            </button>
        </div>
        <img style="width: 100%; height:600px; margin-bottom: 50px" src="{{ asset('img/img.png') }}" alt="">
    @endsection
</div>
