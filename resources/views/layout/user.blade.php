<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    {{-- Fontawesome --}}
    <script src="https://kit.fontawesome.com/9046a62732.js" crossorigin="anonymous"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header class="header">
        <div class="tab-1">
            <a href="#">About </a>
            <a href="#">Store </a>
            <a href="#">Blog </a>
            <a href="#">Contact </a>
            <a href="#">FAQ</a>
        </div>

        <div class="tab-2">
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook" style="color: white;"></i></a>
            <a href="https://x.com/"><i class="fa-brands fa-x-twitter" style="color: white"></i></a>
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram" style="color: white;"></i></a>
            <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube" style="color: white;"></i></a>
            <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest" style="color: white;"></i></a>
        </div>
    </header>

    <nav class="container-fluid navbar navbar-expand-sm">
        <div class="logo">
            <a href=""><img class="container navbar-brand" src="{{ asset('img/logo.png') }}" alt=""></a>
        </div>
        <div class="search">
            <form action="{{ route('SearchUser') }}" method="GET" class="search_form" role="search">
                <input type="text" name="query" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Search</button>
            </form>
        </div>

        <div>
            @if (session('message'))
                <script>
                    alert('{{ session('message') }}');
                </script>
            @endif
        </div>

        <div class="tools">
            <div class="user">
                <a href="{{ url('/dashboard/') }}"><i class="fa-solid fa-user"></i></a>
                {{-- <a class="user-1" href="{{ url('/dashboard/') }}">Đăng nhập/</a>
                <a class="user-2" href="{{ url('/register/') }}">Đăng ký </a> --}}
            </div>
            <div class="cart">
                <a href="#">
                    <i class="fa-solid fa-cart-shopping"></i>
                </a>
            </div>
        </div>
    </nav>

    <div class="menu">
        <div class="nav">
            <li class="nav-item">
                <a class="nav-link" id="home" aria-current="page" href="{{ route('home') }}">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="blog" href="#">Bài viết</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link" id="product" href="{{ route('ListProducts') }}">Sản phẩm</a> --}}
                <div class="dropdown">
                    <button type="button" class="btn btn-dark">Sản phẩm</button>
                    <div class="dropdown-menu">
                        <a href="{{ url('/pro_by_cate/1') }}" class="dropdown-item">Acer</a>
                        <a href="{{ url('/pro_by_cate/2') }}" class="dropdown-item">Asus</a>
                        <a href="{{ url('/pro_by_cate/3') }}" class="dropdown-item">Dell</a>
                        <a href="{{ url('/pro_by_cate/4') }}" class="dropdown-item">HP</a>
                        <a href="{{ url('/pro_by_cate/5') }}" class="dropdown-item">Lenovo</a>
                        <a href="{{ url('/pro_by_cate/6') }}" class="dropdown-item">MSI</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact" href="#">Liên hệ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="policy" href="#">Chính sách đổi trả</a>
            </li>
        </div>
        <div class="phone">
            <p>| Holine: 0123456789</p>
        </div>
    </div>

    <div class="slider">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/banner_acer.png') }}" class="d-block w-100" alt="...">
                </div>
                <img src="" alt="">
                <div class="carousel-item">
                    <img src="{{ asset('img/banner_asus.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner_dell.jpg') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner_hp.jpg') }}" class="d-block w-100" alt="">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/banner_lenovo.png') }}" class="d-block w-100" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="">

        @yield('content')
    </div>

    <button id="scrollToTopBtn" title="Go to top" class="scroll-to-top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <footer class="footer">
        <div class="footer-address">
            {{-- <div class="footer-address-logo">
                <a href=""><img class="container navbar-brand" src="{{ asset('img/logo.png') }}"
                        alt=""></a>
            </div> --}}
            <h4>Shop Laptop và phụ kiện PHT</h4>
            <br>
            <p>Holine - Your Online Shopping Destination</p>
            <p><i class="fa-solid fa-location-dot"></i> 12345, Street Name, City, Country</p>
            <p><i class="fa-solid fa-phone"></i> Phone: 0123456789</p>
            <p><i class="fa-solid fa-envelope"></i> Email: info@holine.com</p>
        </div>
        <ul class="footer-nav">
            <div class="footer-nav-1">
                <h4>Về chúng tôi</h4>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chính sách đổi trả</a>
                </li>
            </div>

            <div class="footer-nav-2">
                <h4>Hỗ trợ khách hàng</h4>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Chính sách đổi trả</a>
                </li>
            </div>
        </ul>

        <div class="footer-navbar">
            <h6>Theo dõi chúng tôi</h6>
            <div class="footer-navbar-icon">
                <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://x.com/"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.youtube.com/"><i class="fa-brands fa-youtube"></i></a>
                <a href="https://www.pinterest.com/"><i class="fa-brands fa-pinterest"></i></a>
            </div>
            <br>
            <div class="search">
                <form class="search_form" role="search">
                    <input type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
            </div>
            <br>
            <div class="cards">
                <img src="{{ asset('img/acer.png') }}" alt="">
                <img src="{{ asset('img/asus.png') }}" alt="">
                <img src="{{ asset('img/dell.png') }}" alt="">
                <img src="{{ asset('img/lenovo.png') }}" alt="">
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    {{-- Javascript --}}
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
