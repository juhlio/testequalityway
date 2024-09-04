@extends('adminlte::page')

@section('title', 'Detalhes do Cliente')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes do Cliente</h3>
        </div>
        <div class="card-body">
            <!-- Informações do Cliente -->
            <dl class="row">
                <dt class="col-sm-3">Nome:</dt>
                <dd class="col-sm-9">{{ $client->name }}</dd>

                <dt class="col-sm-3">E-mail:</dt>
                <dd class="col-sm-9">{{ $client->email }}</dd>

                <dt class="col-sm-3">Telefone:</dt>
                <dd class="col-sm-9">{{ $client->phone }}</dd>

                <dt class="col-sm-3">Documento:</dt>
                <dd class="col-sm-9">{{ $client->doc }}</dd>

                <dt class="col-sm-3">Localização (UF):</dt>
                <dd class="col-sm-9">{{ $client->uf }}</dd>
            </dl>
        </div>
        <div class="card-footer">
            <a href="{{route('homeClients')}}" class="btn btn-primary">Voltar para a Lista</a>
            <a href="{{route('editClient', $client->id)}}" class="btn btn-warning">Editar</a>

            <form action="{{ route('deleteClient', $client->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Você tem certeza que deseja excluir este cliente?')">Excluir</button>
            </form>
        </div>
    </div>
</div>

@endsection
