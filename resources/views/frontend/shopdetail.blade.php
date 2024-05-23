@php
    $client = Session::get('client');
@endphp
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $mains->site_title }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('f0rontend/assets/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <style>
        .star-card {
            max-width: 33rem;
            background: #fff;
            margin: 0 1rem;
            padding: 1rem;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
            width: 100%;
            border-radius: 0.5rem;
        }

        .icon-star {
            font-size: 10vh;
            cursor: pointer;
        }

        .one {
            color: yellow;
        }

        .two {
            color: yellow;
        }

        .three {
            color: yellow;
        }

        .four {
            color: yellow;
        }

        .five {
            color: yellow;
        }

        .colorLabel {
            user-select: none;
            display: inline-block;
            background-color: #eee;
            color: #888;
            /* padding: 0  10px; */
            font-family: sans-serif, Arial;
            border: 7px solid #ddd;
            border-radius: 50%;
            cursor: pointer;
            margin-right: 4px;
        }

        .colorRadio {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .colorRadio:checked+label {
            background-color: #888;
            border-color: #888;
            color: #fff;
        }
    </style>
</head>


<body>


<header class="header-style-three">
        <div class="header-top-wrap">
            <div class="container custom-container-two">
                <div class="row align-items-center justify-content-center">
                    <div class="col-sm-6">
                        <div class="header-top-link">

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="header-top-right">
                            <div class="lang">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="main-header menu-area">
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <a href="/"><img src="{{ asset('images/logo.png') }}"
                                            width="120px" alt="Logo"></a>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="menu-item-has-children has--mega--menu"><a href="/">Home</a>
                                        </li>
                                        <li class=" has--mega--menu"><a href="{{ route('order.page') }}">My orders</a>
                                        </li>

                                        <li class="menu-item-has-children"><a href="/blog">Blog</a>
                                        </li>
                                        <li><a href="/contact">Contact Us</a></li>

                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#" data-toggle="modal"
                                                data-target="#search-modal"><i class="flaticon-search"></i></a></li>
                                        @if (!isset($client))
                                            <li class="sign-in"><a href="{{ route('client.login') }}">Sign In</a>
                                            </li>
                                        @else
                                            <li class="sign-in"><a href="{{ route('client.logout') }}"><i
                                                        style="color: red" class="fas fa-sign-out-alt"></i></a></li>
                                        @endif
                                        <li class="header-wishlist"><a href="#"><i
                                                    class="flaticon-heart-shape-outline"></i></a></li>
                                        <li class="header-shop-cart"><a href="#"><i
                                                    class="flaticon-shopping-bag"></i><span>{{ count($carts) }}</span></a>
                                            <ul class="minicart">
                                                @foreach ($carts as $cart)
                                                    <li class="d-flex align-items-start">
                                                        <div class="cart-img">
                                                            <a href="#"><img src="{{ asset($cart->image) }}"
                                                                    alt=""></a>

                                                        </div>
                                                        <div class="cart-content">
                                                            <h4><a href="#"> {{ $cart->id }},
                                                                    {{ $cart->name }}</a></h4>
                                                            <div class="cart-price">
                                                                <span class="new"> Price:
                                                                    {{ $cart->oldprice - $cart->oldprice * ($cart->discount / 100) }}
                                                                    </span>
                                                                <span><del>{{ $cart->oldprice  }}
                                                                        </del></span>
                                                            </div>
                                                            <div class="cart-price">
                                                                <span class="new">Count {{ $cart->count }}
                                                                </span>
                                                                <span class="new">
                                                                    <br>With Count :
                                                                    {{ ($cart->oldprice - $cart->oldprice * ($cart->discount / 100)) * $cart->count }}
                                                                </span>

                                                            </div>
                                                        </div>
                                                        <div class="del-icon">
                                                            <a href="{{ route('delete.cart', $cart->id) }}"><i
                                                                    class="far fa-trash-alt"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach

                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Total:</span>
                                                        <span class="f-right">
                                                            @php
                                                                $totalDiscount = 0;
                                                            @endphp
                                                            @foreach ($carts as $cart)
                                                                @php
                                                                    $discountAmount =
                                                                        ($cart->oldprice -
                                                                            $cart->oldprice * ($cart->discount / 100)) *
                                                                        $cart->count;
                                                                    $totalDiscount += $discountAmount;
                                                                @endphp
                                                            @endforeach
                                                            @php
                                                                echo $totalDiscount;
                                                            @endphp $


                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="{{ route('cart.page') }}">Shopping Cart</a>
                                                        <a class="black-color" href="/checkout">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>


                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->


                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search-end -->

        <!-- off-canvas-start -->
        <div class="sidebar-off-canvas info-group">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-widget scroll">
                <div class="sidebar-widget-container">
                    <div class="off-canvas-heading">
                        <a href="#" class="close-side-widget">
                            <span class="flaticon-targeting-cross"></span>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- off-canvas-end -->

    </header>


    <main>
        {{-- {{ $product_ids }} --}}


        <!-- breadcrumb-area -->
        <div class="breadcrumb-area breadcrumb-style-two"
            data-background="{{ asset('frontend/assets/img/bg/s_breadcrumb_bg01.jpg') }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="previous-product">
                            <a
                                href="{{ route('main.show', $products->id == 1 ? $products->id : $products->id - 1) }}"><i
                                    class="fas fa-angle-left"></i> previous product</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    <li class="breadcrumb-item"><a href="/">{{ $products->category->name }}</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $products->name }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 d-none d-lg-block">
                        <div class="next-product">
                            <a href="{{ route('main.show', $products->id + 1) }}">Next product <i
                                    class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area-end -->

        <!-- shop-details-area -->
        <section class="shop-details-area pt-100 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="shop-details-flex-wrap">
                            <div class="shop-details-nav-wrap">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach ($products->images as $image)
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link {{ $loop->index == 0 ? 'active' : '' }}"
                                                id="-product{{ $image->id }}-tab" data-toggle="tab"
                                                href="#product-{{ $image->id }}" role="tab"
                                                aria-controls="{{ $image->id }}" aria-selected="true"><img
                                                    src="{{ asset($image->image) }}" alt="">
                                            </a>
                                        </li>
                                    @endforeach


                                </ul>


                            </div>
                            <div class="shop-details-img-wrap">
                                <div class="tab-content" id="myTabContent">
                                    @foreach ($products->images as $image)
                                        <div class="tab-pane fade {{ $loop->index == 0 ? 'show active' : '' }}"
                                            id="product-{{ $image->id }}" role="tabpanel"
                                            aria-labelledby="product-{{ $image->id }}-tab">
                                            <div class="shop-details-img">
                                                <img src="{{ asset($image->image) }}" width="532" height="500"
                                                    alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="shop-details-content">

                            <a href="#" class="product-cat">{{ $products->category->name }}</a>
                            <h3 class="title">{{ $products->name }}</h3>

                            <form action= "{{ route('add.cart') }}"
                                method="POST" class="rating">
                                @csrf
                                <input type="number" name="product_id" value="{{ $products->id }}" hidden>
                                {{-- {{ $products->reviewsCount()->avg('rating') }} --}}
                                @php
                                    $rating = round($products->reviewsCount()->avg('rating'));
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo " <i class='fas fa-star' style='color: yellow'></i> ";
                                        } else {
                                            echo "<i class='fas fa-star' style='color: gray'></i>";
                                        }
                                    }

                                @endphp
                                <br><br>
                                <p class="style-name">Style Name : {{ $products->about }}</p>
                                <div class="price">Price : {{ $products->price }}</div>
                                <div class="product-details-info">
                                    <span>Size <a href="#">Guide</a></span>
                                    @if ($cart != null)

                                        <div class="sidebar-product-size mb-30">
                                            <h4 class="widget-title">Product Size</h4>
                                            <div class="shop-size-list">

                                                <ul>

                                                    @foreach ($products->sizes as $size)
                                                        <input class="radioSize" type="radio"
                                                            {{ $cart->size_id == $size->id ? 'checked' : '' }}
                                                            name="sizes" id="{{ $size->id }}"
                                                            value="{{ $size->sizeItem->id }}" hidden required>

                                                        <li class="mr-1">
                                                            <label for="{{ $size->id }}">
                                                                {{ $size->sizeItem->size }}
                                                            </label>
                                                        </li>
                                                    @endforeach


                                                </ul>


                                            </div>
                                        </div>
                                        <div class="sidebar-product-color">
                                            <h4 class="widget-title">Color</h4>
                                            <div class="shop-color-list">
                                                <ul>
                                                    @foreach ($products->colors as $color)
                                                        {{-- {{ $color->colorItem->id }} --}}
                                                        <input type="radio"
                                                            {{ $cart->color_id == $color->id ? 'checked' : '' }}
                                                            name="color_id" class="colorRadio"
                                                            id="{{ $color->colorItem->color }}"
                                                            value="{{ $color->colorItem->id }}" hidden required>
                                                        <label for="{{ $color->colorItem->color }}"
                                                            class="colorLabel">
                                                            <li
                                                                style="height:20px; width:20px; border-radius:50%; background-color:{{ $color->colorItem->color }};">
                                                            </li>
                                                        </label>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @elseif($cart == null)
                                        <div class="sidebar-product-size mb-30">
                                            <h4 class="widget-title">Product Size</h4>
                                            <div class="shop-size-list">

                                                <ul>

                                                    @foreach ($products->sizes as $size)
                                                        <input class="radioSize" type="radio" name="sizes"
                                                            id="{{ $size->id }}"
                                                            value="{{ $size->sizeItem->id }}" hidden required>

                                                        <li class="mr-1">
                                                            <label for="{{ $size->id }}">
                                                                {{ $size->sizeItem->size }}
                                                            </label>
                                                        </li>
                                                    @endforeach


                                                </ul>

                                            </div>
                                        </div>
                                        <div class="sidebar-product-color">
                                            <h4 class="widget-title">Color</h4>
                                            <div class="shop-color-list">
                                                <ul>
                                                    @foreach ($products->colors as $color)
                                                        {{-- {{ $color->colorItem->id }} --}}
                                                        <input type="radio" name="color_id" class="colorRadio"
                                                            id="{{ $color->colorItem->color }}"
                                                            value="{{ $color->colorItem->id }}" hidden required>
                                                        <label for="{{ $color->colorItem->color }}"
                                                            class="colorLabel">

                                                            <li
                                                                style="height:20px; width:20px; border-radius:50%; background-color:{{ $color->colorItem->color }};">
                                                            </li>
                                                        </label>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="perched-info">
                                    @if ($cart != null)
                                        <div class="cart-plus-minus">
                                            <div class="num-block">
                                                <input type="number" class="in-num" name="count"
                                                    value="{{ $cart->count }}" readonly>
                                                <div class="qtybutton-box">
                                                    <span class="plus"><i class="fa fa-plus"
                                                            aria-hidden="true"></i></span>
                                                    <span class="minus dis"><i class="fa fa-minus"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif($cart == null)
                                        <div class="cart-plus-minus">
                                            <div class="num-block">
                                                <input type="number" class="in-num" name="count" value="1"
                                                    readonly>
                                                <div class="qtybutton-box">
                                                    <span class="plus"><i class="fa fa-plus"
                                                            aria-hidden="true"></i></span>
                                                    <span class="minus dis"><i class="fa fa-minus"
                                                            aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                        <button type = "submit" class="btn">Add to cart </button>

                                    <div class="wishlist-compare">
                                        <ul>
                                            @if ($cart != null)
                                                <li><a href="{{ route('delete.cart', $cart->id) }}"><i
                                                            class="far fa-trash-alt"></i>Remove to cart</a>
                                                </li>
                                            @endif
                                            <br>
                                            <li><a href=""><i class="far fa-heart"></i> Add to Wishlist</a>
                                            </li><br>
                                            <li><a href="#"><i class="fas fa-retweet"></i> Add to Compare
                                                    List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="product-details-share">
                                    <ul>
                                        <li>Share :</li>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="related-product-wrap">
                    <div class="row">
                        <div class="col-12">
                            <div class="related-product-title">


                                <h4 class="title">You May Also Like...</h4>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="row related-product-active">
                    @foreach ($product as $item)
                        <div class="col-xl-3">
                            <div class="new-arrival-item text-center">
                                <div class="thumb mb-25">
                                    <a href="{{ route('main.show' , $item->id) }}"><img src="{{ asset($item->image) }}" alt=""></a>
                                    <div class="product-overlay-action">
                                        <ul>
                                            <li><a href=""><i class="far fa-heart"></i></a></li>
                                            <li><a href=""><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="">{{ $item->name }}</a></h5>
                                    <span class="price">{{ $item->price }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><br><br>
        <!-- shop-details-area-end -->

    </main>
    <!-- main-area-end -->


    <!-- footer-area -->

    <!-- footer-area-end -->

    <script>
        var sizeRadio = document.querySelectorAll('.sizeRadio');

        function setActiveSize(type) {
            if (type == "size") {
                sizeRadio.forEach(function(input) {
                    input.addEventListener('change', function() {
                        sizeRadio.forEach(function(input) {
                            var label = document.querySelector('label[for="' + input.id + '"]');
                            if (input.checked) {
                                label.classList.add('active');
                            } else {
                                label.classList.remove('active');
                            }
                        });
                    });
                });
            }

        }
    </script>
    <!-- JS here -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

    <script>
        // script.js

        // To access the stars
        let stars =
            document.getElementsByClassName("star");
        let output =
            document.getElementById("output");

        function gfg(n) {
            remove();
            for (let i = 0; i < n; i++) {
                if (n == 1) cls = "one";
                else if (n == 2) cls = "two";
                else if (n == 3) cls = "three";
                else if (n == 4) cls = "four";
                else if (n == 5) cls = "five";
                stars[i].className = "star " + cls;
            }
            output.value = n;

        }


        // To remove the pre-applied styling
        function remove() {
            let i = 0;
            while (i < 5) {
                stars[i].className = "star";
                i++;
            }
        }
    </script>
    {{-- Toastr --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>
</body>

</html>
