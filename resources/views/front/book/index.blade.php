@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="breadcrumbs-main">
                <ol class="breadcrumb">
                    <li><a href="{{route('index')}}">Ana Sayfa</a></li>
                    <li class="active">{{$data[0]['name']}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!--end-breadcrumbs-->
    <!--start-single-->
    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left">
                            <div class="flexslider">
                                <ul class="slides">
                                </ul>
                            </div>
                            <!-- FlexSlider -->
                            <script src="{{asset('js/imagezoom.js')}}"></script>
                            <script defer src="{{asset('js/jquery.flexslider.js')}}"></script>
                            <link rel="stylesheet" href="{{asset('css/flexslider.css')}}" type="text/css"
                                  media="screen"/>
                            <script>
                                // Can also be used with $(document).ready()
                                $(window).load(function () {
                                    $('.flexslider').flexslider({
                                        animation: "slide",
                                        controlNav: "thumbnails"
                                    });
                                });
                            </script>
                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{$data[0]['name']}}</h2>
                                <h5 class="item_price">{{$data[0]['price']}}</h5>
                                <p>{{$data[0]['description']}}</p>
                                <ul class="tag-men">
                                    <li><span>Yayın Evi</span>
                                        <span class="women1">: {{\App\Models\Publishers::getField($data[0]['publisher_id'],'name')}}</span></li>
                                    <li><span>Kategori</span>
                                        <span class="women1">: {{\App\Models\Categories::getField($data[0]['category_id'],'name')}}</span></li>
                                    <li><span>Yazar</span>
                                        <span class="women1">: {{\App\Models\Authors::getField($data[0]['author_id'],'name')}}</span></li>
                                </ul>
                                <a href="#" class="add-cart item_add">ADD TO CART</a>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="latestproducts">
                        <div class="product-one">
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="single.html" class="mask"><img class="img-responsive zoom-img"
                                                                            src="images/p-1.png" alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>Smart Watches</h3>
                                        <p>Explore Now</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                class=" item_price">$ 329</span></h4>
                                    </div>
                                    <div class="srch">
                                        <span>-50%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
