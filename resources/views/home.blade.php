@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (auth()->check())
                   @if (auth()->user()->can_post())
                    Bentornato {{ Auth::user()->name }}
                    <br>
                    Questa è la tua bacheca. 
                    <br>
                    @else
                    Benvenuto {{ Auth::user()->name }}<br>
                    Attendi la conferma da parte di un'amministratore l'approvazione del tuo account.
                   @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
