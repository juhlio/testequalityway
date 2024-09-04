@extends('adminlte::page')

@section('title', 'Editar Cliente')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Cliente</h3>
        </div>
        <div class="card-body">
            <!-- Formulário para edição do cliente -->
            <form method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $client->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}" required>
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="doc">Documento:</label>
                    <input type="text" id="doc" name="doc" class="form-control" value="{{ old('doc', $client->doc) }}" required>
                    @error('doc')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="uf">UF:</label>
                    <select id="uf" name="uf" class="form-control" required>
                        <option value="">Selecione</option>
                        @foreach (['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'] as $uf)
                            <option value="{{ $uf }}" {{ old('uf', $client->uf) == $uf ? 'selected' : '' }}>{{ $uf }}</option>
                        @endforeach
                    </select>
                    @error('uf')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('homeClients') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection
