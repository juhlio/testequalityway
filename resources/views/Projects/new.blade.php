@extends('adminlte::page')

@section('title', 'Criar Projeto')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Projeto</h3>
        </div>
        <div class="card-body">
            <!-- Formulário para criar um novo projeto -->
            <form method="POST" >
                @csrf

                <div class="form-group">
                    <label for="client">Cliente:</label>
                    <input type="text" id="client" name="client" class="form-control" value="{{ old('client') }}" required>
                    @error('client')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="installation_type">Tipos de Instalação:</label>
                    <select id="installation_type" name="installation_type" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="Fibrocimento (Madeira)" {{ old('installation_type') == 'Fibrocimento (Madeira)' ? 'selected' : '' }}>Fibrocimento (Madeira)</option>
                        <option value="Fibrocimento (Metalico)" {{ old('installation_type') == 'Fibrocimento (Metalico)' ? 'selected' : '' }}>Fibrocimento (Metalico)</option>
                        <option value="Cerâmico" {{ old('installation_type') == 'Cerâmico' ? 'selected' : '' }}>Cerâmico</option>
                        <option value="Metalico" {{ old('installation_type') == 'Metalico' ? 'selected' : '' }}>Metalico</option>
                        <option value="Laje" {{ old('installation_type') == 'Laje' ? 'selected' : '' }}>Laje</option>
                        <option value="Solo" {{ old('installation_type') == 'Solo' ? 'selected' : '' }}>Solo</option>
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
                            <div class="form-row mb-2">
                                <div class="col">
                                    <input type="checkbox" name="equipment[]" value="{{ $equipment }}" id="equipment_{{ $loop->index }}" {{ in_array($equipment, old('equipment', [])) ? 'checked' : '' }}>
                                    <label for="equipment_{{ $loop->index }}">{{ $equipment }}</label>
                                </div>
                                <div class="col">
                                    <input type="number" name="quantity[{{ $equipment }}]" class="form-control" placeholder="Quantidade" min="1" value="{{ old('quantity.' . $equipment, 1) }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @error('equipment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Salvar Projeto</button>
                <a href="{{ route('homeProjects') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection

@section('js')

<script src="{{ asset('vendor/autocomplete/jquery.easy-autocomplete.min.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        var options = {
            url: "{{route('apiClients')}}",
            getValue: "name",
            list: {
                match: {
                    enabled: true
                },
                maxNumberOfElements: 5
            },
            theme: "description"
        };
        $('#client').each(function() {
            $(this).easyAutocomplete(options);
        });
    });
</script>

@endsection

@section('css')
<link href="{{ asset('vendor/autocomplete/easy-autocomplete.min.css')}}" rel="stylesheet">
<link href="{{ asset('vendor/autocomplete/easy-autocomplete.themes.min.css')}}" rel="stylesheet">

@endsection
