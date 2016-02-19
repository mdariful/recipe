{!! Form::open([
    'route' => 'recipe.store'
]) !!}
{!! Form::hidden('on_recipe', '{{ $recipe->id }}') !!}
{!! Form::label('description', 'Aggiungi gli ingredienti') !!}
{!! Form::textarea('name_ing', null, ['class' => 'form-control']) !!} 

</div>
<div class="form-group">
{!! Form::submit('Aggiungi ingredienti', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}