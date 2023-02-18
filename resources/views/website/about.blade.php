@extends('website.layout')
@section('title') من نحن |Pets Zone @endsection
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-area pt-60 pb-55 pt-sm-30 pb-sm-20">
        <div class="container">
            <div class="breadcrumb">
                <ul>
                    <li><a href="/">الرئيسية</a></li>
                    <li class="active"><a href="#">من نحن</a></li>
                </ul>
            </div>
        </div>
        <!-- Container End -->
    </div>
    <!-- Breadcrumb End -->
    <!-- About Main Area Start -->
    <div class="about-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="about-img" style="text-align: center;">
                        <img class="img" src="{{ asset('website/img/Jeddah university.png')}}" alt="about-us" style="width:19%;">
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-2"></div>
                <div class="col-lg-8 col-md-12">
                    <div class="about-content mt-5">
                        <h3>من نحن</h3>
                        <p>يوفر موقع Pet Zone بيئة آمنة لأصحاب الحيوانات الأليفة للتفاعل والتواصل الاجتماعي ودعم بعضهم البعض. يوفر Pet Zone مجموعة واسعة من الخدمات لتلبية احتياجات أصحاب الحيوانات الأليفة وحيواناتهم. يساهم Pet Zone بشكل أساسي في تبسيط رعاية الحيوانات الأليفة من خلال توفير الخدمات الطبية والإجابة على الأسئلة ومساعدة الجميع على موقع ويب واحد.</p> <br>
                        <h4>تنفيذ الطالبات:</h4>
                        <ul class="mt-20 about-content-list">
                            <li>غاده خالد الحساني</li>
                            <li>فتون محمد فران</li>
                            <li>امنيه عادل مليباري</li>
                            <li>حليمه محمد العقيلي</li>
                            <li>شهد الشيخ</li>
                        </ul>
                        <h4 class="mt-5">تحت اشراف :</h4>
                        <ul class="mt-20 about-content-list">
                            <li>د.صفاء حبيب الله</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="about-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12">
                    <div class="about-img">
                        <img class="img" src="{{ asset('website/img/banner/about.jpg')}}" alt="about-us">
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="about-content">
                        <h3>Why We are?</h3>
                        <p>Mellentesque faucibus dapibus dapibus. Morbi aliquam aliquet neque. Donec placerat dapibus sollicitudin. Morbi arcu nisi, mattis ullamcorper in, dapibus ac nunc. Cras bibendum mauris et sapien nibh feugiat. scelerisque accumsan nibh gravida. Quisque aliquet justo elementum lectus ultrices bibendum.</p> <br>
                        <p>dapibus ac nunc. Cras bibendum mauris et sapien feugiat. scelerisque accumsan nibh gravida. Quisque aliquet justo elementum lectus ultrices bibendum.</p>
                        <ul class="mt-20 about-content-list">
                            <li><a href="#">Amazing wordpress theme</a></li>
                            <li><a href="#">HTML &amp; CSS3 build with bootstrap</a></li>
                            <li><a href="#">Powerfull admin panel</a></li>
                            <li><a href="#">Icon well organized &amp; SEO optimized friendy</a></li>
                            <li><a href="#">Iconncredible design</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- About Main Area End -->
    <!-- Contact Email Area Start -->
    {{-- <div class="contact-email-area ptb-60">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Contact Us</h3>
                    <p class="text-capitalize mb-40">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    <form id="contact-form" class="contact-form" action="mail.php" method="post">
                        <div class="address-wrapper">
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="address-fname">
                                        <input type="text" name="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-email">
                                        <input type="email" name="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="address-web">
                                        <input type="text" name="website" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="address-subject">
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="address-textarea">
                                        <textarea name="message" placeholder="Write your message"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="form-message ml-15"></p>
                        <div class="col-xs-12 footer-content mail-content">
                            <div class="send-email">
                                <input type="submit" value="Submit" class="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Contact Email Area End -->
@endsection