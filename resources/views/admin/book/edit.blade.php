@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>

    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Kitap Düzenle</h4>
    <form action="{{route('admin.book.update',['id'=>$data[0]['id']])}}" role="form" class="text-start" method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <input type="text" name="name" value="{{$data[0]['name']}}" class="form-control"
                   placeholder="Kitap Adı Giriniz">
        </div>
        <div class="input-group input-group-outline my-3">
            <input type="text" name="price" value="{{$data[0]['price']}}" class="form-control"
                   placeholder="Kitap Fiyatı Giriniz">
        </div>
        <div class="input-group input-group-outline my-3">
            <div class="form-group m-2">
                <strong>Yazarlar</strong>
                <select name="author_id" class="form-control custom-select">
                    <option value="{{$data[0]['authors']}}">Yazar Seçin</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                                @if($author->id == $data[0]['author_id'])
                                    selected
                            @endif>
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-2">
                <strong>Yayın Evi</strong>
                <select name="publisher_id" class="form-control custom-select">
                    <option value="{{$data[0]['publisher']}}">Yayın Evi Seçin</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                                @if($publisher->id == $data[0]['publisher_id'])
                                    selected
                            @endif>
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-2">
                <strong>Kategori</strong>
                <select name="category_id" class="form-control custom-select">
                    <option value="{{$data[0]['category']}}">Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id == $data[0]['category_id'])
                                    selected
                            @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-group input-group-outline my-3">

        </div>
        <div class="input-group input-group-outline my-3">
            <textarea type="text" name="description" value="{{$data[0]['description']}}" class="form-control"
                      placeholder="Kitap Açıklama Giriniz"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Düzenle</button>
        </div>
    </form>
@endsection
