@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Variazione per "{{ $recipe->name }}"</h1>
<p class="lead">Aggiorna, o <a href="{{ route('recipe.index') }}">torna alle ricette.</a></p>
<hr>


    {!! Form::model($recipe, [
    'method' => 'PUT',
    'route' => ['recipe.update', $recipe->id]
]) !!}
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
</div>
<div class="form-group">
{!! Form::submit('Aggiorna ricetta', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}
{!! Form::open([
'method' => 'DELETE',
'route' => ['recipe.destroy', $recipe->id]
]) !!}
{!! Form::submit('Cancella', ['class' => 'btn btn-primary btn-danger form-control']) !!}
{!! Form::close() !!}
</div>
@endsection