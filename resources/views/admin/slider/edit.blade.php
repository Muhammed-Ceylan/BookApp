@extends('layouts.admin')
@section('content')
    @if(session('status'))
        <div class="alert-alert primary" role="alert">
            {{session('status')}}
        </div>
    @endif
    <h4 class="font-weight-bolder mt-2 mb-0">Slider Düzenle</h4>
    <form action="{{route('admin.slider.update',['id'=>$data[0]['id']])}}" role="form" class="text-start"
          method="POST">
        {{csrf_field()}}
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary">Düzenle</button>
        </div>
    </form>
@endsection
