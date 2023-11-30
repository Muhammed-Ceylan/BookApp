@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>

    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Yazar Ekle</h4>
    <form enctype="multipart/form-data" action="{{route('admin.author.store')}}" role="form" class="text-start"
          method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <input type="text" name="name" class="form-control" placeholder="Yazar Adı Giriniz">
        </div>
        <div class="input-group input-group-outline my-3">
            <input type="file" name="image" class="form-control" placeholder="Yazar Resmi Yükle">
        </div>
        <div class="input-group input-group-outline my-3">
           <textarea type="text" name="bio" class="form-control" placeholder="Yazar Bio Giriniz"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Ekle</button>
        </div>
    </form>
@endsection
