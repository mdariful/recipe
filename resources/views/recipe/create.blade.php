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
<!--<div class="form-group">
    
		<input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Aggiungi gli ingredienti</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field entry input-group">
                        <input autocomplete="off" class="input form-control" id="field1" name="prof1" type="text" />
                        <span class="input-group-btn"><button id="b1" class="btn add-more btn-success btn-add" type="button">+</button></span>
                        </div>
                    </div>
                </form>
            </div>
      
    </div>
    
</div>-->
<div class="form-group">
{!! Form::label('ingredient_list', 'Ingredienti:', ['class' =>'control-label']) !!}

{!! Form::select('ingredient_list[]', $ingredients, null, ['id' => 'ingredient_list', 'class' => 'form-control', 'multiple']) !!}

</div>


<div class="form-group">
{!! Form::submit('Aggiungi ricetta', ['class' => 'btn btn-primary form-control']) !!}
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
           text: newIngredient.term + ' (new)'
       };
   }
      });
</script>
@endsection