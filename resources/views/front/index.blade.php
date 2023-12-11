@extends('layouts.app')
@section('content')
    <div class="product">
        <div class="container">
            <div class="product-top">
                @foreach(\App\Models\Books::all()->chunk(4) as $chunk)
                    <div class="product-one">
                        @foreach($chunk as $key => $value)
                            <div class="col-md-3 product-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="{{route('book.edit',['self_link' => $value['self_link']])}}"
                                       class="mask"><img class="img-responsive zoom-img"
                                                         src="images/p-1.png"
                                                         alt=""/></a>
                                    <div class="product-bottom">
                                        <h3>{{$value['name']}}</h3>
                                        <p>{{\App\Models\Publishers::getField($value['publisher_id'],"name")}}</p>
                                        <h4><a class="item_add" href="#"><i></i></a> <span
                                                    class=" item_price">{{$value['price']}}</span></h4>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
