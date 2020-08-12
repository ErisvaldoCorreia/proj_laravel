@extends('templates.base')

@section('content')

    <h1 class="text-center mt-4 mb-4">
        Agenda de Contatos
    </h1>
    <hr/>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("agenda/$contato->id/edit")}}">
            <button class="btn btn-success">Editar o Contato</button>
        </a>
    </div>
    <div class="col-8 m-auto">
        @php
            $friend = $contato->find($contato->id)->relUser;
        @endphp
        <div class="card">
            <div class="card-header">
              Detalhes da Agenda
            </div>
            <div class="card-body">
              <h5 class="card-title">Nome: {{$contato->contato}}</h5>
              <p class="card-text">
                  <strong>E-mail: </strong> {{$contato->email}}<br>
                  <strong>Telefone: </strong> {{$contato->telefone}}<br>
                  <strong>Função: </strong> {{$contato->empresa}}<br>
                  <strong>Contato de: </strong> {{$friend->name}}</p><br>
              <a href="{{url('agenda/')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>

@endsection
