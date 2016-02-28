@extends('layouts.app')

@section('content')
<div class="container">
	<section id="wrapper">

		<div class="row">

			<div class="col-sm-9">
				<section class="panel panel-default mail-container">
					<div class="panel-heading"><strong><span class="fa fa-th"></span> Ricetta</strong></div>
					<div class="panel-body">
						<div class="mail-header row">
							
							<div class="col-md-8">
								
								<h3>{{ $recipe->name }}</h3>
							</div>
							
						</div>
						<div class="mail-info">
							<div class="row">
								<div class="col-md-8">
									<ul class="list-unstyled list-inline">
										<li><i class="fa fa-calendar-o"></i>{{ date('d F Y', strtotime($recipe->created_at)) }}</li>
										<li><i class="fa fa-user"></i>{{$recipe->user->name}}</li>
										<li><i class="fa fa-cutlery"></i>{{ $recipe->category }}</li>
										<li><i class="fa fa-hourglass"></i>{{ $recipe->difficult }}</li>
									</ul>
								</div>
							</div>
						</div>
					
						<div class="col-md-12">
							@unless ($recipe->ingredients->isEmpty())
							<ul class="list-group">
								<h4>Ingredienti: </h4>
								@foreach($recipe->ingredients as $ingredienti)
								<li class="list-group-item">{{$ingredienti->name}}</li>
								@endforeach
							</ul>
								@endunless
						</div>
						
						
							<div class="col-md-12">
								<h4>Preparazione: </h4>
							{!! nl2br(e($recipe->description)) !!}
						</div>
						<div class="col-md-12">
							<img class="img-responsive img-thumbnail" src="/images/recipe/{{$recipe->id}}.jpg" alt="" /></a>
						</div>
					</div>
				</section>
			</div>
			
			<div class="col-sm-3">
				<section class="panel panel-default mail-categories">
					    <div class="panel-heading"><strong><span class="fa fa-th"></span> Menu</strong></div>
					@if (Auth::guest())
					<ul class="list-group">
						<li class="list-group-item"><a href="{{ route('recipe.index') }}">
							<i class="fa fa-envelope-o"></i> Torna indietro
						</a></li>
						<li class="list-group-item"><a href="{{ route('recipe.create') }}">
							<i class="fa fa-paper-plane"></i> Manda la tua ricetta
						</a></li>
						@else
							<li class="list-group-item"><a href="{{ route('recipe.index') }}">
							<i class="fa fa-envelope-o"></i> Torna indietro
						</a></li>
						 @if (auth()->check())
                   @if (auth()->user()->is_admin() || (auth()->user()->id == $recipe->user_id))
						<li class="list-group-item"><a href="{{ route('recipe.edit', $recipe->id) }}">
							<i class="fa fa-edit"></i>Modifica o Cancella
						</a></li>
						@endif
                    @endif
					</ul>
					@endif
				</section>
			</div>
			
		</div>

	</section>
@endsection