@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
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
{!! Form::label('category', 'Categoria:', ['class' =>'control-label']) !!}

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
{!! Form::label('ingredient_list', 'Ingredienti:', ['class' =>'control-label']) !!}

{!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple']) !!}

</div>

<div class="form-group">
{!! Form::submit('Aggiorna ricetta', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}

{!! Form::open([
'method' => 'DELETE',
'route' => ['recipe.destroy', $recipe->id]
]) !!}
<div class="form-group">
{!! Form::submit('Cancella', ['class' => 'btn btn-primary btn-danger form-control']) !!}
</div>
{!! Form::close() !!}
</div>
</div>
@endsection
@section('footer')
<script type="text/javascript">
  $('#ingredient_list').select2({
       placeholder: 'Scegliere o aggiungere gli ingredienti' ,
       tags: true,
       tokenSeparators: [",", " "],
        createTag: function(newIngredient) {
       return {
           id: 'new:' + newIngredient.term,
           text: newIngredient.term + ' (+)'
       };
   }
      });
</script>
@endsection