@extends('layouts.admin')

@section('content')





<div class="container">
<div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
      </div>
      <!-- /.col-lg-12-->
    </div>
    <!-- /.row-->
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"><i class="fa fa-users fa-5x"></i></div>
              <div class="col-xs-9 text-right">
                
                <div class="huge">{{$user}}</div>
                
                <div>Utenti</div>
              </div>
            </div>
          </div><a href="{{ route('admin.user') }}">
            <div class="panel-footer"><span class="pull-left">Visualizza utenti</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"><i class="fa fa-cutlery fa-5x"></i></div>
              <div class="col-xs-9 text-right">
                
                <div class="huge">{{$recipe}}</div>
               
                <div>Ricetta</div>
              </div>
            </div>
          </div><a href="{{ route('admin.recipe') }}">
            <div class="panel-footer"><span class="pull-left">Visualizza le ricette</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"><i class="fa fa-cutlery fa-5x"></i></div>
              <div class="col-xs-9 text-right">
                
                <div class="huge">{{$ingredient}}</div>
                
                <div>Ingredienti</div>
              </div>
            </div>
          </div><a href="{{ route('admin.ingredient') }}">
            <div class="panel-footer"><span class="pull-left">Visualizza gli ingredienti</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div></a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3"><i class="fa fa-life-ring fa-5x"></i></div>
              <div class="col-xs-9 text-right">
                
                <div class="huge">Ci trovi su</div>
                
                <div>Github</div>
              </div>
            </div>
          </div><a href="https://github.com/mdariful/recipe">
            <div class="panel-footer"><span class="pull-left">Rimani aggiornato</span><span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div></a>
        </div>
      </div>
</div>

@endsection