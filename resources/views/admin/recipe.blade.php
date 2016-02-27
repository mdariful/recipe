@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="page-header">Lista delle ricette</h1>
    <table class="table table-striped custab">
    <thead>
        
        <tr>
            <th>Nome</th>
            <th>Azioni</th>
        </tr>
    </thead>
    @foreach($recipe as $rec)
            <tr>
                <td>{{$rec->name}}</td>
                <td>
                {!! Form::close() !!}

                {!! Form::open([
                'method' => 'DELETE',
                'route' => ['rec.destroy', $rec->id]
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
    {!! $recipe->render() !!}
    </div>
</div>
@endsection