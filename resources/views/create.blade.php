@extends('app')
   
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <h2>Добавить нового ученого в список</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/') }}"> Назад</a>
        </div>
    </div>
</div>
      
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Ошибка!</strong> Присутствует ошибка в введенных Вами данных.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                <input type="text" name="name" class="form-control" placeholder="Имя, Фамилия">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Годы жизни:</strong>
                <input type="text" name="years" class="form-control" placeholder="1800 – 2022">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Описание:</strong>
                <textarea class="form-control" style="height:150px" name="detail" placeholder="Описание"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Изображение:</strong>
                <input type="file" name="image" class="form-control" placeholder="Изображение">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Отправить</button>
        </div>
    </div>
      
</form>
@endsection