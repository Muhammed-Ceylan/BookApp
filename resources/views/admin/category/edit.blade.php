@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>
    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Kategori Düzenle</h4>
    <form action="{{route('admin.category.update',['id'=>$data[0]['id']])}}" role="form" class="text-start"
          method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Kategori Adı Giriniz</label>
            <input type="text" name="name" value="{{$data[0]['name']}}" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Düzenle</button>
        </div>
    </form>
@endsection
