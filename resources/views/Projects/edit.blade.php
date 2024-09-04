@extends('adminlte::page')

@section('title', 'Editar Projeto')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Projeto</h3>
        </div>
        <div class="card-body">
            <form method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="client">Cliente:</label>
                    <input type="text" id="client" name="client" class="form-control" value="{{ $project->name }}" readonly>
                    @error('client')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="installation_type">Tipo de Instalação:</label>
                    <select id="installation_type" name="installation_type" class="form-control" required>
                        <option value="Fibrocimento (Madeira)" {{ old('installation_type', $project->instalationType) == 'Fibrocimento (Madeira)' ? 'selected' : '' }}>Fibrocimento (Madeira)</option>
                        <option value="Fibrocimento (Metálico)" {{ old('installation_type', $project->instalationType) == 'Fibrocimento (Metálico)' ? 'selected' : '' }}>Fibrocimento (Metálico)</option>
                        <option value="Cerâmico" {{ old('installation_type', $project->instalationType) == 'Cerâmico' ? 'selected' : '' }}>Cerâmico</option>
                        <option value="Metálico" {{ old('installation_type', $project->instalationType) == 'Metálico' ? 'selected' : '' }}>Metálico</option>
                        <option value="Laje" {{ old('installation_type', $project->instalationType) == 'Laje' ? 'selected' : '' }}>Laje</option>
                        <option value="Solo" {{ old('installation_type', $project->instalationType) == 'Solo' ? 'selected' : '' }}>Solo</option>
                    </select>
                    @error('installation_type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="equipment">Equipamentos:</label>
                    <div id="equipment-container">
                        @php
                        $equipments = ['Módulo', 'Inversor', 'Microinversor', 'Estrutura', 'Cabo vermelho', 'Cabo preto', 'String Box', 'Cabo Tronco', 'Endcap'];
                        @endphp
                        @foreach($equipments as $equipment)
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="equipment[{{ $loop->index }}][name]" value="{{ $equipment }}"
                                @if(in_array($equipment, array_column($equipaments->toArray(), 'equipament')))
                            checked
                            @endif>
                            <label class="form-check-label">{{ $equipment }}</label>

                            <input type="number" name="equipment[{{ $loop->index }}][quantity]" class="form-control d-inline-block ml-2" style="width: 100px;"
                                value="{{ old('equipment.' . $loop->index . '.quantity', $equipaments->where('equipament', $equipment)->first()->quantity ?? '') }}">
                        </div>
                        @endforeach
                    </div>
                    @error('equipment.*.name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    @error('equipment.*.quantity')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success">Salvar Alterações</button>
                <a href="{{ route('homeProjects') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection
