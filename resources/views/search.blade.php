@extends('layouts.app')

@section('content')
<div class="container">
    <div class="well well-sm">
        <strong>Visualizzazione</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-th-list">
            </span>Lista</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                class="glyphicon glyphicon-th"></span>Griglia</a>
        </div>
    </div>
    @if(count($recipe) === 0)
        <h1>Nessun risultato trovato</h1>
     @else   
    <div id="products" class="row list-group">
        @foreach($recipe as $ricetta)
        <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail">
                <img class="group list-group-image" src="{{ URL::asset('img/ricette.jpg') }}" alt="" />
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        {{ str_limit($ricetta->name, $limit = 20, $end = '...') }}</h4>
                    <p class="group inner list-group-item-text">
                        {{ str_limit($ricetta->description, $limit = 150, $end = '...') }}</p>
                        
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <p class="lead">
                            Difficoltà: {{ $ricetta->difficult }}  
                            </p>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <a class="btn btn-success" href="{{ route('recipe.show', $ricetta->id) }}">Visualizza la ricetta</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    
</div>

@endsection