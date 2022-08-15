@extends('app')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <br>
                <h2>Список ученых</h2>
            </div>
            <div class="pull-right" style="margin-bottom:10px;">
            <a class="btn btn-primary" href="{{ url('create') }}"> Создать карточку ученого</a>
            </div>
        </div>
    </div>
     
    @if ($message = Session::get('success'))
        <div class="alert alert-primary">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>Номер</th>
            <th>Изображение</th>
            <th>Имя</th>
            <th>Годы жизни</th>
            <th>Описание</th>
            <th width="300px">Действие</th>
        </tr>
        @foreach ($scientists as $scientist)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/images/{{ $scientist->image }}" width="100px"></td>
            <td>{{ $scientist->name }}</td>
            <td>{{ $scientist->years }}</td>
            <td>{{ $scientist->detail }}</td>
            <td>
                <form action="{{ route('destroy',$scientist->id) }}" method="POST">
      
                    <a class="btn btn-info" href="{{ route('show',$scientist->id) }}">Обзор</a>
       
                    <a class="btn btn-primary" href="{{ route('edit',$scientist->id) }}">Изменить</a>
      
                    @csrf
                    @method('DELETE')
         
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     
    {!! $scientists->links() !!}
 
@endsection