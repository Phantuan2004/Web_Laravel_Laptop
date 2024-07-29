<div>
    @extends('layout.user')
    @section('content')
        <style>
            img {
                width: 300px;
                height: auto;
                margin: 0 auto;
            }

            .content {
                width: 70%;
                padding: 20px;
                margin: 0 auto;
                border: 1px solid #ddd;
                border-radius: 10px;
                margin-bottom: 20px;
                text-align: justify;
                font-size: 18px;
                line-height: 1.5;
                background-color: #f5f5f5;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16);
                transition: background-color 0.3s ease;

                &:hover {
                    background-color: #f8f8f8;
                }

                .product_relate {
                    width: 150px;
                    height: auto;
                }

                .card {
                    width: 300px;
                    height: auto;
                }

                .card img {
                    width: 150px;
                    height: auto;
                    margin: 0 auto;
                }
            }

            .ct {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }
        </style>
        <div class="container mb-5 mt-5">
            <div class="card detail">
                <h1 class="card-header">Thông tin chi tiết sản phẩm</h1>
                <br>
                <img src="{{ Str::startsWith($detail->image, 'http') ? $detail->image : asset('/storage/' . $detail->image) }}"
                    alt="{{ $detail->name }}" class="img-fluid"> <br>
                <div class="content">
                    <h2 class="text-center">{{ $detail->name }}</h2>
                    <div class="ct">
                        <div class="m1">
                            <h3>Giá: {{ $detail->price }}$</h3>
                            <h5>Số lượng sản phẩm: {{ $detail->quantity }}</h5>
                            <p><b>Mô tả về sản phẩm: </b> {{ $detail->mota }}</p>
                        </div>
                        <div class="m2">
                            <a href="#"><i class="fa-solid fa-cart-shopping" style="color: black"></i></a>
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sản phẩm liên quan --}}
        <div class="container-fluid py-5">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
                <span class="bg-secondary pr-3">Các sản phẩm khác</span>
            </h2>
            <div class="row px-xl-5">
                <div class="col d-flex justify-content-center">
                    @foreach ($random as $list)
                        <div class="row_product">
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
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
</div>
