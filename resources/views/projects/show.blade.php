@extends('layouts.masterPage')
@section('pretitle', '')
@section('title', '')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center">{{$project->name}}</h1>
            <div class="d-flex justify-content-center gap-2 mt-2 mb-4">
                <a href="{{route('tasks.create', ['project_id' => $project->id])}}" class="btn btn-primary">Criar Nova Tarefa</a>
                <a href="{{ route('projects.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-lg-4 row-cols-md-3 g-4 justify-content-center">
                @foreach($tasks as $task)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h3>{{ $task->name }}</h3>
                            <p>{{ $task->description }}</p>
                            <ul>
                                @foreach($task->tags as $tag)
                                    <li>{{$tag->tag}}</li>
                                @endforeach
                            </ul>
                            <p>
                                <span class="badge rounded-pill
                                    @if($task->status->status == 'Finalizado') bg-success
                                    @elseif($task->status->status == 'Em Andamento') bg-primary
                                    @elseif($task->status->status == 'Pendente') bg-warning
                                    @elseif($task->status->status == 'Cancelado') bg-danger
                                    @else bg-secondary
                                    @endif">
                                    {{ $task->status->status }}
                                </span>
                            </p>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="ti ti-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>
    </div>

@endsection

@push('scripts')
    {{--O meu JS para essa página--}}
@endpush
