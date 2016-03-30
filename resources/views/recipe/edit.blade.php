@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <h1>Variazione per "{{ $recipe->name }}"</h1>
    <p class="lead">Aggiorna, o <a href="{{ route('recipe.index') }}">torna alle ricette.</a></p>
    <hr>

</div>
    {!! Form::model($recipe, [
    'method' => 'PUT',
    'route' => ['recipe.update', $recipe->id]
]) !!}
<div class="row">
<div class="col-md-4">

    <div class="form-group">
        {!! Form::label('name', 'Nome della ricetta:') !!}
        {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
    </div>
    </div>
  <div class="col-md-4">
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

</div>

<div class="col-md-4">
    <div class="form-group">
{!! Form::label('name', 'Difficoltà:', ['class' =>'control-label']) !!}

{!! Form::select('difficult', [
   'Alta' => 'Alta',
   'Media' => 'Media',
   'Bassa' => 'Bassa'],
    null, ['class' => 'form-control']
) !!}

</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
<div class="form-group">
{!! Form::label('description', 'Descrizione della ricetta:') !!}
{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="form-group">
{!! Form::label('ingredient_list', 'Ingredienti:', ['class' =>'control-label']) !!}

{!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple']) !!}

</div>
</div>
</div>
<div class="row">
<div class="col-md-9">
    </div>
    <div class="col-md-3">
        <div class="form-group  pull-right">
{!! Form::submit('Aggiungi ricetta', ['class' => 'btn btn-primary form-control']) !!}
</div>
    </div>

</div>

{!! Form::close() !!}
</div>
@endsection
@section('footer')
<script type="text/javascript">
  $('#ingredient_list').select2({
       placeholder: 'Scegliere o aggiungere gli ingredienti separati dalla virgola',
       tags: true,
       tokenSeparators: [","],
        createTag: function(newIngredient) {
       return {
           id: 'new:' + newIngredient.term,
           text: newIngredient.term + ' (+)'
       };
   }
      });
</script>
@endsection