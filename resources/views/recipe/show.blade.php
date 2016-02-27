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
										<li><i class="fa fa-calendar-o"></i>{{ $recipe->created_at }}</li>
										<li><i class="fa fa-user"></i>{{$recipe->user->name}}</li>
										<li><i class="fa fa-cutlery"></i>{{ $recipe->category }}</li>
										<li><i class="fa fa-hourglass"></i>{{ $recipe->difficult }}</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="mail-content">
							{{ $recipe->description }}
						</div>
						<div class="mail-actions">
							@unless ($recipe->ingredients->isEmpty())
							<ul class="list-unstyled">
								<li><i class="fa fa-check"></i>Ingredienti: </li>
								@foreach($recipe->ingredients as $ingredienti)
								<li><span class="label label-default">{{$ingredienti->name}}</span></li>
								@endforeach
							</ul>
						@endunless
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
						@else
							<li class="list-group-item"><a href="{{ route('recipe.index') }}">
							<i class="fa fa-envelope-o"></i> Torna indietro
						</a></li>
						
						<li class="list-group-item"><a href="{{ route('recipe.edit', $recipe->id) }}">
							<i class="fa fa-edit"></i>Modifica o Cancella
						</a></li>
					</ul>@endif
				</section>
			</div>
			
		</div>

	</section>



@endsection