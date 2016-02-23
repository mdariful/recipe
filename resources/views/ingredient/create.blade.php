@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    
{!! Form::open([
    'route' => 'ingredient.store'
], ['class'=>'form-horizontal']) !!}

<div class="form-group">
{!! Form::label('name', 'Nome ingrediente:') !!}
{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
{!! Form::submit('Aggiungi ingrediente', ['class' => 'btn btn-primary form-control']) !!}
</div>
</div>
<div class="row">
    
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
                <td><a class="btn btn-success btn-sm" href="{{ route('ingredient.edit', $ing->id) }}">Modifica</a></td>
            </tr>
             @endforeach
    </table>
   
    <div class="page-nation">
    {!! $ingredient->render() !!}
    </div>
</div>
</div>
@endsection



