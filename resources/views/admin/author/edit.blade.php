@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>

    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Yazar Düzenle</h4>
    <form enctype="multipart/form-data" action="{{route('admin.author.update',['id'=>$data[0]['id']])}}"
          role="form"
          class="text-start"
          method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <input type="text" name="name" class="form-control" value="{{$data[0]['name']}}"
                   placeholder="Yazar Adı Giriniz">
        </div>
        <div class="input-group input-group-outline my-3">
            <input type="file" name="image" class="form-control" value="{{$data[0]['image']}}"
                   placeholder="Yazar Resmi Yükle">
        </div>
        <div class="input-group input-group-outline my-3">
            <textarea type="text" name="bio" class="form-control" value="{{$data[0]['bio']}}"
                      placeholder="Yazar Bio Giriniz"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Düzenle</button>
        </div>
    </form>
@endsection
