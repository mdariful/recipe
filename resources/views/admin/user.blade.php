@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="page-header">Tutti gli utenti</h1>
    <div class="row col-md-12">
    <table class="table table-striped custab">
             <thead>
             <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Permessi</th>
            <th class="text-center">Azioni</th>
        </tr>
            </thead>
            @foreach($user as $utenti)
            <tr>
                
                <td>{{$utenti->name}}</td>
                <td>{{$utenti->email}}</td>
                <td>{{$utenti->role}}</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="{{ route('admin.edit', $utenti->id) }}"><span class="glyphicon glyphicon-edit"></span> Modifica</a></td>
            
            </tr>
            @endforeach
    </table>
    </div>
</div>
@endsection