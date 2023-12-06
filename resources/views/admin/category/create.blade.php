@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>

    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Kategori Ekle</h4>
    <form action="{{route('admin.category.store')}}" role="form" class="text-start" method="POST">
        {{csrf_field()}}
        <div class="input-group input-group-outline my-3">
            <label class="form-label" >Kategori Adı Giriniz</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Ekle</button>
        </div>
    </form>
@endsection
