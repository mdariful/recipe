@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    
{!! Form::open([
    'route' => 'recipe.store'
], ['class'=>'form-horizontal']) !!}

<div class="form-group">
{!! Form::label('name', 'Nome della ricetta:') !!}
{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
{!! Form::label('description', 'Descrizione della ricetta:') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
{!! Form::label('name', 'Difficoltà:', ['class' =>'control-label']) !!}

{!! Form::select('difficult', [
   'Alta' => 'Alta',
   'Media' => 'Media',
   'Bassa' => 'Bassa'],
    null, ['class' => 'form-control']
) !!}

</div>

<div class="form-group">
{!! Form::label('name', 'Categoria:', ['class' =>'control-label']) !!}

{!! Form::select('category', [
   'Antipasti' => 'Antipasti',
   'Primi' => 'Primi',
   'Secondi' => 'Secondi',
   'Contorni' => 'Contorni',
   'Dolci e Dessert' => 'Dolci e Dessert'],
    null, ['class' => 'form-control']
) !!}

</div>

<div class="form-group">
{!! Form::submit('Aggiungi ricetta', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}
</div>
</div>
@endsection