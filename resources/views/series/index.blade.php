<x-layout title="Séries">

    @auth
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{ $mensagemSucesso }}
    </div>
    @endisset

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <ul class="list-group">
        @foreach ($series as $series)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <img class="me-3" src="{{ asset('storage/' . $series->cover) }}" width="100" class="thumbnail" alt="">
                @auth <a href="{{ route('seasons.index', $series->id) }}" class="me-3"> @endauth
                {{ $series->nome }}
                @auth </a> @endauth
            </div>
            @auth
            <span class="d-flex">
                @if (Auth::user()->admin)
                {{ $series->user_name }}
                @endif
                <form action="{{ route('series.destroy', $series->id) }}" class="ms-3" method="POST">
                    @csrf
                    @method('DELETE')
                    <span class="badge rounded-pill @if($series->isComplete()) bg-success  @else bg-secondary @endif">
                        {{ $series->percentageOfWatchedEpisodes() }}%
                    </span>
                    <a href="{{ route('series.edit', $series->id) }}" class="btn btn-primary btn-sm" style="margin-left: 15px;">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <button class="btn btn-danger btn-sm ms-1">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
            </span>
            @endauth
        </li>
        @endforeach
    </ul>
</x-layout>
