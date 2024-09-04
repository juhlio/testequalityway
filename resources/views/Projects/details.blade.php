@extends('adminlte::page')

@section('title', 'Detalhes do Projeto')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Detalhes do Projeto</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Detalhes do Cliente -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informações do Cliente</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>Nome:</strong> {{ $project->name }}</p>
                            <p><strong>E-mail:</strong> {{ $project->email }}</p>
                            <p><strong>Telefone:</strong> {{ $project->phone }}</p>
                            <p><strong>Documento:</strong> {{ $project->doc }}</p>
                            <p><strong>Localização:</strong> {{ $project->uf }}</p>
                        </div>
                    </div>
                </div>

                <!-- Detalhes do Projeto -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Informações do Projeto</h4>
                        </div>
                        <div class="card-body">
                            <p><strong>ID do Projeto:</strong> {{ $project->project_id }}</p>
                            <p><strong>Tipo de Instalação:</strong> {{ $project->instalationType }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lista de Materiais Usados -->
            <div class="mb-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Materiais Usados</h4>
                    </div>
                    <div class="card-body">
                        @if($equipaments->isEmpty())
                        <p class="text-center">Nenhum material registrado para este projeto.</p>
                        @else
                        <ul class="list-group">
                            @foreach($equipaments as $equipament)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $equipament->equipament }}</span>
                                <span >{{ $equipament->quantity }}</span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('homeProjects') }}" class="btn btn-secondary">Voltar</a>
                <a href="{{route('editProject', $project->project_id)}}" class="btn btn-warning">Editar</a>

                <form action="{{route('deleteProject', $project->project_id)}}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este projeto?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
@endsection
