@extends('templates.base')

@section('content')

    <h1 class="text-center mt-4 mb-4">
        Agenda de Contatos
    </h1>
    <hr/>

    <div class="col-8 m-auto">
        <div class="text-center mt-3 mb-4">
            <a href="{{url('agenda/create')}}">
                <button class="btn btn-success">Cadastrar</button>
            </a>
            <a href="{{url('/')}}">
                <button class="btn btn-danger">Sair</button>
            </a>
        </div>

            @if (session()->get('success'))
                <div class="alert alert-success" id="myAlert">
                    <button type="button" class="close">&times;</button>
                    <strong>Sucesso!</strong> {{ session()->get('success') }}
                </div>
            @endif

    </div>

    @if(count($contato) <= 0)
        <div class="col-8 m-auto">
            <div class="alert alert-warning">
                <h5>Você não possui nenhum contato</h5>
            </div>
        </div>
    @else
    <div class="col-8 m-auto">
        @csrf
        <table class="table text-center">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Contato</th>
                <th scope="col">Email</th>
                <th scope="col">Friend</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($contato as $contatos)
                @php
                    $friend = $contatos->find($contatos->id)->relUser;
                @endphp
                <tr>
                    <th scope="row">{{$contatos->id}}</th>
                    <td>{{$contatos->contato}}</td>
                    <td>{{$contatos->email}}</td>
                    <td>{{$friend->name}}</td>
                    <td>

                        {{-- coletando id no params de rota para link de page --}}
                        <a href="{{url("agenda/$contatos->id")}}">
                            <button class="btn btn-dark">
                                <ion-icon name="search"></ion-icon>
                            </button>
                        </a>

                        <a href="{{url("agenda/$contatos->id/edit")}}">
                            <button class="btn btn-primary">
                                <ion-icon name="create"></ion-icon>
                            </button>
                        </a>

                        <form action="{{ route('agenda.destroy', $contatos->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">
                                <ion-icon name="trash"></ion-icon>
                            </button>
                        </form>

                    </td>
                </tr>
              @endforeach

            </tbody>
          </table>
    </div>
    @endif

@endsection
