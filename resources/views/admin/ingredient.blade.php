@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="page-header">Lista degli ingredienti</h1>
    <table class="table table-striped custab">
    <thead>
        
        <tr>
            <th>Nome</th>
            <th>Azioni</th>
        </tr>
    </thead>
    @foreach($ingredient as $ing)
            <tr>
                <td>{{$ing->name}}</td>
                <td>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['ingredient.destroy', $ing->id]
                ]) !!}
                <div class="form-group">
                {!! Form::submit('Cancella', ['class' => 'btn btn-warning btn-sm']) !!}
                </div>
                {!! Form::close() !!}
                </td>
            </tr>
             @endforeach
    </table>
   
    <div class="page-nation">
    {!! $ingredient->render() !!}
    </div>
</div>
@endsection