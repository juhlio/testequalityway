@extends('adminlte::page')

@section('title', 'Lista de Clientes')

@section('content')

<br>
<div class="card p-4">

    <!-- Bloco de alertas -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Botão para adicionar novo cliente -->
    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('newClient') }}">Adicionar Cliente</a>
    </div>

    <table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Documento</th>
                <th>Localização</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->name}}</td>
                <td>{{$cliente->email}}</td>
                <td>{{$cliente->phone}}</td>
                <td>{{$cliente->doc}}</td>
                <td>{{$cliente->uf}}</td>
                <td> <a class="btn btn-success" href="{{route('getClient', $cliente->id)}}">Mais Informações</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection

@section('css')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

@endsection

@section('js')

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.js"> </script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próxima",
                    "first": "Primeira",
                    "last": "Última"
                },
                "columnDefs": [{
                    "orderable": true,
                    "targets": 0
                }],
                "order": [
                    [0, "desc"]
                ],
            },
            responsive: true
        });
    });
</script>

@endsection
