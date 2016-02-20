{!! Form::open([
    'route' => 'ingredient.create'
], ['class'=>'form-horizontal']) !!}


{!! Form::label('name', 'Aggiungi gli ingredienti') !!}
{!! Form::text('name', null, ['class' => 'form-control']) !!} 

</div>
<div class="form-group">
{!! Form::submit('Aggiungi ingredienti', ['class' => 'btn btn-primary form-control']) !!}
</div>

{!! Form::close() !!}