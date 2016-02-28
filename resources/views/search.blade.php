@extends('layouts.app')

@section('content')
<div class="container">
    @if(isset($recipe))
    @if(count($recipe) == 0)
        <h1>Nessun risultato trovato</h1>
     @else   
     @foreach (array_chunk($recipe->all(), 4) as $column)
      <div class="row">
          @foreach ($column as $ric)
              <div class="col-md-3">
            <div class="thumbnail">
                
                <a href="{{ route('recipe.show', $ric->id) }}">
                <img class="img-responsive" src="images/recipe/{{$ric->id}}.jpg" alt="" /></a>
                <div class="caption">
                    <h4 class="group inner list-group-item-heading">
                        {!! str_limit($ric->name, $limit = 25, $end = '...') !!}</h4>
                    <p class="group inner list-group-item-text">
                       {!! str_limit($ric->description, $limit = 180, $end = '...') !!}</p>
                        
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="lead">
                            {{ $ric->category }}  
                            </p>
                        </div>
                    </div>
                </div>
            
            </div>
            </div>
          @endforeach
      </div>
    @endforeach
    @endif
    @endif
</div>

@endsection