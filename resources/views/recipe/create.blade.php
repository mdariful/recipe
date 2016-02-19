@extends('layouts.app')

@section('content')

{!! Form::open([
    'route' => 'recipe.store'
]) !!}
<div class="container">
<div class="form-group">
{!! Form::label('name', 'Nome della ricetta:') !!}
{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
{!! Form::label('description', 'Descrizione della ricetta:') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
{!! Form::label('name', 'Difficoltà:') !!}
{!! Form::select('difficult', [
   'Alta' => 'Alta',
   'Media' => 'Media',
   'Bassa' => 'Bassa'],
    null, ['class' => 'controls']
) !!}
{!! Form::select('category', [
   'Antipasti' => 'Antipasti',
   'Primi' => 'Primi',
   'Secondi' => 'Secondi'],
   'Contorni' => 'Contorni'],
   'Dolci e Dessert' => 'Dolci e Dessert'],
    null, ['class' => 'controls']
) !!}
</div>
<div class="form-group">
{!! Form::submit('Aggiungi ricetta', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}
</div>
@endsection