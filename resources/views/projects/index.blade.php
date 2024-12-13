@php use Illuminate\Support\Str; @endphp
@extends('layouts.masterPage')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Bem-Vindo, {{ auth()->user()->name }}</h1>

            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-danger">Log Out</button>
            </form>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{route('projects.create')}}" class="btn btn-primary mb-3">Criar Novo Projeto</a>

                <form action="{{ route('projects.index') }}" method="GET" class="d-flex mb-3">
                    <input type="text" name="buscar" class="form-control me-2" placeholder="Buscar projetos..." value="{{ request('buscar') }}">

                    <!-- Filtro por status -->
                    <select name="status" class="form-select">
                        <option value="">Todos os Status</option>
                        <option value="criado" {{ request('status') == 'criado' ? 'selected' : '' }}>Criado</option>
                        <option value="em andamento" {{ request('status') == 'em andamento' ? 'selected' : '' }}>Em Andamento</option>
                        <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="finalizado" {{ request('status') == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                        <option value="cancelado" {{ request('status') == 'cancelado' ? 'selected' : '' }}>Cancelado</option>

                    </select>

                    <button type="submit" class="btn btn-secondary">Buscar</button>
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary ms-2">Limpar</a>
                </form>
                @if($projects->isEmpty())
                    <p class="mt-4">Você ainda não possui projetos criados.</p>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Data de Conclusão</th>
                                <th class="w-auto text-end">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($projects as $project)
                                <tr>
                                    <td class="d-none">{{ $project->id }}</td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ Str::limit($project->description, 40) }}</td>
                                    <td>{{ $project->status->status}}</td>
                                    <td>{{$project->due_date}}</td>
                                    <td class="text-end">
                                        <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-secondary">
                                            <i class="fa fa-plus" aria-hidden="true"></i> </a>

                                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info"><i class="ti ti-eye"></i></a>
                                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col d-flex justify-content-center">
                {{ $projects->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {{-- O meu JS para essa página --}}
@endpush
