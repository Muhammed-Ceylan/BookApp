@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>

    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Kitap Ekle</h4>
    <form action="{{route('admin.book.store')}}" role="form" class="text-start" method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Kitap Adı Giriniz</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Kitap Fiyatı Giriniz</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="input-group input-group-outline my-3">
            <div class="form-group m-2">
                <strong>Yazarlar</strong>
                <select name="author_id" class="form-control custom-select">
                    <option value="">Yazar Seçin</option>
                    @foreach($authors as $author)
                        <option value="{{ $author->id }}"
                                @if($author->id) selected @endif>{{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-2">
                <strong>Yayın Evi</strong>
                <select name="publisher_id" class="form-control custom-select">
                    <option value="">Yayın Evi Seçin</option>
                    @foreach($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                                @if($publisher->id) selected @endif>{{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group m-2">
                <strong>Yayın Evi</strong>
                <select name="category_id" class="form-control custom-select">
                    <option value="">Kategori Seçin</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                                @if($category->id) selected @endif>{{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="input-group input-group-outline my-3">

        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Kitap Açıklama Giriniz</label>
            <textarea type="text" name="description" class="form-control"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Ekle</button>
        </div>
    </form>
@endsection
