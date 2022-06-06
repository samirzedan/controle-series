<x-layout title="Nova Série">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-8">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" autofocus id="nome" name="nome" class="form-control">
            </div>
            <div class="col-2">
                <label for="seasonsQty" class="form-label">N° Temporadas:</label>
                <input type="number" id="seasonsQty" name="seasonsQty" class="form-control">
            </div>
            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Eps / Temporada:</label>
                <input type="number" id="episodesPerSeason" name="episodesPerSeason" class="form-control">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                    <input type="file"
                                    id="cover"
                                    name="cover"
                                    class="form-control"
                                    accept="image/gif, image/jpeg, image/png">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="{{ route('series.index') }}" class="btn">Cancelar</a>
    </form>
</x-layout>
