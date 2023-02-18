<!doctype html>
<html class="no-js" lang="en-US" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Pets Zone</title>
    <meta name="description" content="Default Description">
    <meta name="keywords" content="E-commerce" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('website/img/icon/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css?family=Lily+Script+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('website/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/nivo-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap_rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/default_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style_rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/chat.css') }}">
    <script src="{{ asset('website/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    @yield('css')
</head>

<body>
    <!-- Wrapper Start -->
    <div class="wrapper homepage">
        <!-- Header Area Start -->
        <header>
            <!-- Header Bottom Start -->
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-1 col-lg-2 col-sm-5 col-5">
                            <div class="logo">
                                <a href="/"><img src="{{ asset('website/img/logo/logo.png') }}" alt="logo-image"
                                        style="width: 113px;"></a>
                            </div>
                        </div>
                        <!-- Primary Vertical-Menu End -->
                        <!-- Search Box Start -->
                        <div class="col-xl-9 col-lg-8 d-none d-lg-block">
                            <div class="middle-menu pull-right">
                                <nav>
                                    <ul class="middle-menu-list">
                                        <li><a href="/">الرئيسية</a></li>
                                        <li><a href="{{route('ads.create')}}">انشر اعلانك</a></li>  
                                        <li><a href="{{route('ads.index')}}">الإعلانات</a></li>  
                                        <li><a href="{{route('chats.index')}}">استشر بيطري</a></li>
                                        <li><a href="{{route('posts.index')}}">إسأل هنا</a></li>
                                        <li><a href="{{route('home.appointmentForm')}}">احجز في العيادة</a></li>
                                        <li><a href="{{route('announce.create')}}">الإبلاغ</a></li> 
                                        {{-- <li><a href="{{route('home.appointmentForm')}}">المجتمع</a></li> --}}
                                        <li><a href="{{route('home.about')}}">حول</a></li>
                                        <li><a href="{{route('shop.index')}}">التسوق</a></li>
                                        <li><a href="{{route('home.instructions')}}">ارشادات</a></li>
                                        {{-- <li><a href="{{route('adm.login.get')}}" style="color: red;margin-right:rem;">ادمن</a> </li>
                                        <li><a href="{{route('adm.employee.login.get')}}" style="color: red;margin-right:rem;">موظف</a> </li> --}}
                                        
                                    </ul>
                                </nav>
                            </div>  
                        </div>
                        <!-- Search Box End -->
                        <!-- Cartt Box Start -->
                        <div class="col-lg-2 col-xl-2 col-sm-7 col-7">
                            <div class="cart-box text-right">
                                <ul>
                                    <li><a href="/"><i class="fa fa-user-plus"></i></a>
                                        <ul class="ht-dropdown">
                                            @auth
                                                <li><a href="{{route('account.index')}}">حسابي</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">تسجيل خروج</a>
                                                </li>
                                                <form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
                                                    @csrf
                                                </form>
                                            @else
                                                <li><a href="{{route('login')}}">تسجيل دخول</a></li>
                                                <li><a href="{{route('register')}}">تسجيل جديد</a></li>
                                            @endauth
                                        </ul>
                                    </li>
                                    <li><a href="#"><i class="fa fa-shopping-basket"></i><span
                                                class="cart-counter">{{$cartItems !== [] ? $cartItems->count() : 0}}</span></a>
                                        <ul class="ht-dropdown main-cart-box">
                                            <li>
                                                <?php $total = 0 ?>
                                                @foreach ($cartItems as $item)
                                                <?php $total +=  $item->price * $item->quantity ?>
                                                    <!-- Cart Box Start -->
                                                    <div class="single-cart-box">
                                                        <div class="cart-img">
                                                            <a href="#"><img src="{{ asset($item->product->media[0]->link) }}" alt="cart-image"></a>
                                                        </div>
                                                        <div class="cart-content">
                                                            <h6><a href="/">{{$item->product->name}}</a></h6>
                                                            <span>{{$item->quantity}} × {{$item->price}} ريال</span>
                                                        </div>
                                                        <a class="del-icone" href="#" data-productid="{{$item->product->id}}"><i class="fa fa-window-close-o"></i></a>
                                                    </div>
                                                    <!-- Cart Box End -->
                                                @endforeach
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer fix">
                                                    <h5>  الإجمالي : <span class="f-right" style="float: unset;margin-right: 16px;">  {{$total}} ريال</span></h5>
                                                    <div class="cart-actions">
                                                        <a class="checkout" href="{{route('cart.index')}}">تابع للسلة</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cartt Box End -->
                        <div class="col-sm-12 d-lg-none">
                            <div class="mobile-menu">
                                <nav>
                                    <ul>
                                        <li><a href="/">الرئيسية</a>
                                        </li>
                                        <li><a href="/">المتجر</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="/">المنتجات</a>
                                                    <ul>
                                                        <li><a href="/">Product Category Name</a>
                                                            <!-- Start Three Step -->
                                                            <ul>
                                                                <li><a href="/">Product Category Name</a></li>
                                                                <li><a href="/">Product Category Name</a></li>
                                                                <li><a href="/">Product Category Name</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a href="/">Product Category Name</a></li>
                                                        <li><a href="/">Product Category Name</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="/">product details Page</a></li>
                                                <li><a href="/">Cart Page</a></li>
                                                <li><a href="/">Checkout Page</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="#">الصفحات</a>
                                            <!-- Mobile Menu Dropdown Start -->
                                            <ul>
                                                <li><a href="/">تسجيل الدخول</a></li>
                                                <li><a href="/">تسجيل جديد</a></li>
                                            </ul>
                                            <!-- Mobile Menu Dropdown End -->
                                        </li>
                                        <li><a href="/">حولنا</a></li>
                                        <li><a href="/">تواصل معنا</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu  End -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End -->
        </header>
        <!-- Header Area End -->



        @yield('content')



        <footer class="off-white-bg">
            <!-- Footer Top Start -->
            <div class="footer-top pt-50 pb-60">
                <div class="container">
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-4  col-md-7 col-sm-6">
                            <div class="single-footer">
                                <h3>تواصل معنا</h3>
                                <div class="footer-content">
                                    <div class="loc-address">
                                        <span><i class="fa fa-map-marker"></i>جدة</span>
                                        <span><i class="fa fa-envelope-o"></i>الايميل:Pets@zonw.com</span>
                                        <span><i class="fa fa-phone"></i>الهاتف:005555555</span>
                                    </div>
                                    <div class="payment-mth"><a href="#"><img class="img" src="{{ asset('website/img/footer/1.png')}}"
                                                alt="payment-image"></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
                            <div class="single-footer">

                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">روابط</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="{{route('home.about')}}">من نحن</a></li>
                                        <li><a href="{{route('ads.create')}}">انشر اعلانك</a></li>  
                                        <li><a href="{{route('ads.index')}}">الإعلانات</a></li>  
                                        <li><a href="{{route('chats.index')}}">استشر بيطري</a></li>
                                        <li><a href="{{route('posts.index')}}">إسأل هنا</a></li>
                                        <li><a href="{{route('home.appointmentForm')}}">احجز في العيادة</a></li>
                                        <li><a href="{{route('announce.create')}}">الإبلاغ</a></li> 
                                        <li><a href="{{route('shop.index')}}">التسوق</a></li>
                                        <li><a href="{{route('home.instructions')}}">ارشادات</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                 
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                 
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom off-white-bg2">
                <div class="container">
                    <div class="footer-bottom-content">
                        <p class="copy-right-text"> © <a  href="#"></a> جميع الحقوق محفوظة لدى pets zone</p>
                        <div class="footer-social-content">
                            <ul class="social-content-list">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-wifi"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer End -->
    </div>
    <!-- Wrapper End -->


    {{-- <div class="agent-face chat-avatar">
        <div class="half">
            <img class="agent circle" src="{{ asset('website/img/banner/chat.jpg') }}" alt="Jesse Tino">
        </div>
    </div> --}}

    {{-- <section class="avenue-messenger">
        <div class="menu">
            <div class="items"><span>
                    <a href="#" title="Minimize">—</a><br>
                    <a href="#" title="End Chat">✕</a>
                </span>
            </div>
            <div class="button">...</div>
        </div>
        <div class="agent-face">
            <div class="half">
                <img class="agent circle" src="{{ asset('website/img/banner/chat.jpg') }}" alt="Jesse Tino">
            </div>
        </div>
        <div class="chat">
            <div class="chat-title">
                <h1>Jesse Tino</h1>
                <h2>RE/MAX</h2>
            </div>
            <div class="messages">
                <div class="messages-content mCustomScrollbar _mCS_1 mCS_no_scrollbar" style="overflow: auto;">
                    <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" tabindex="0"
                        style="max-height: none;">
                        <div id="mCSB_1_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y"
                            style="position:relative; top:0; left:0;" dir="ltr">
                            <div class="message new">
                                <figure class="avatar"><img src="{{ asset('website/img/banner/chat.jpg') }}"></figure>Hi there, I'm
                                Jesse and you?<div class="timestamp">7:26</div>
                                <div class="checkmark-sent-delivered">✓</div>
                                <div class="checkmark-read">✓</div>
                            </div>
                        </div>
                        <div id="mCSB_1_scrollbar_vertical"
                            class="mCSB_scrollTools mCSB_1_scrollbar mCS-light mCSB_scrollTools_vertical"
                            style="display: none;">
                            <div class="mCSB_draggerContainer">
                                <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                    style="position: absolute; min-height: 30px; top: 0px; height: 0px;"
                                    oncontextmenu="return false;">
                                    <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                                </div>
                                <div class="mCSB_draggerRail"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-box">
                <textarea type="text" class="message-input" placeholder="Type message..."></textarea>
                <button type="submit" class="message-submit">Send</button>
            </div>
        </div>
    </section> --}}



    <script src="{{ asset('website/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/js/slick.min.js') }}"></script>
    <script src="{{ asset('website/js/wow.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('website/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap_rtl.min.js') }}"></script>
    <script src="{{ asset('website/js/popper.js') }}"></script>
    <script src="{{ asset('website/js/plugins.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="{{ asset('website/js/chat.js') }}"></script>
    @yield('js')
    {{-- <script>
        $(document).ready(function(){
            $(".del-icone").click(function(e){
                e.preventDefault();
                let productid = $(this).data('productid');
                let url = "{{route('cart.destroy', ['ID'])}}";
                $.ajax({
                    type:"post",
                    url: url.replace('ID', productid),
                    data:{
                    productid:productid,
                    _token:"{{ csrf_token() }}",
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
        });
    </script> --}}
    <!--Start of Tawk.to Script-->
    {{-- <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/63bb090647425128790c5331/1gm99mgop';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script> --}}
    <!--End of Tawk.to Script-->
</body>
</html>