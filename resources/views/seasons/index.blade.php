<x-layout title="Temporadas de {!! $series->nome !!}">

    <div class="text-center">
        <img src="{{ asset('storage/' . $series->cover) }}" style="height: 400px;" alt="Capa da série" class="img-fluid">
    </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href="{{ route('episodes.index', $season->id) }}">
                Temporada {{ $season->number }}
            </a>
            <span class="d-flex">
                <span class="badge bg-secondary rounded-pill ms-2">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
                <span class="badge rounded-pill ms-2 @if($season->isComplete()) bg-success  @else bg-secondary @endif" >
                    {{ $season->percentageOfWatchedEpisodes() }}%
                </span>
            </span>
        </li>
        @endforeach
    </ul>
    </x-layout>
