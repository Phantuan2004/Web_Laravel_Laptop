<div>
    @extends('layout.user')
    @section('content')
        <div class="list_product mt-5">
            <h1>Sản phẩm giá hời</h1> <br>
            <div class="row">
                @foreach ($min as $list)
                    <div class="product card mb-5">
                        <div class="product-img card-img-top">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}">
                                <img src="{{ $list->image ? $list->image : asset('/storage/' . $list->image) }}"
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


        <div class="list_product mt-5">
            <h1>Sản phẩm cao cấp</h1> <br>
            <div class="row">
                @foreach ($max as $list)
                    <div class="product card mb-5">
                        <div class="product-img card-img-top">
                            <a href="{{ route('DetailProducts', ['id' => $list->id]) }}">
                                {{-- * Kiểm tra xem ảnh thuộc đường dẫn nào thì sẽ lấy đường dẫn đó để hiển thị --}}
                                {{-- Str::startsWith($list->image, 'http') 
                                -> Kiểm tra nếu đg dẫn bắt đầu bằng http thì sẽ biến $list->image là 1 URL đầy đủ 
                                -> Nếu không sẽ biến $list->image là tệp lưu trong 'storagte' và sử dụng asset('/storage/' . $list->image) như là URL đầy đủ --}}
                                <img src="{{ Str::startsWith($list->image, 'http') ? $list->image : asset('/storage/' . $list->image) }}"
                                    alt="{{ $list->name }}" class="img-fluid">
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
