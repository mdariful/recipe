@extends('layouts.admin')

@section('content')
<div class="container">
        <h1 class="page-header">Creazione nuovo utente</h1>
  
    <hr>
{!! Form::open([
    'route' => 'admin.store'
], ['class'=>'form-horizontal']) !!}

<div class="form-group">
{!! Form::label('name', 'Nome utente') !!}
{!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
{!! Form::label('email', 'Indirizzo E-mail') !!}
{!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
{!! Form::label('password', 'Password') !!}
{!! Form::input('text', 'password', null, ['class' => 'form-control']) !!}
{!! Form::label('role', 'Ruolo', ['class' =>'control-label']) !!}

{!! Form::select('role', [
   'admin' => 'admin',
   'author' => 'author',
   'guest' => 'guest'],
    null, ['class' => 'form-control']
) !!}
</div>
<div class="form-group">
{!! Form::submit('Aggiungi utente', ['class' => 'btn btn-primary form-control']) !!}
</div>
</div>
@endsection