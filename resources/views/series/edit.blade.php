<x-layout title="Editar Série">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('series.update', $series->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="row mb-3">
            <div class="col-12">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control" value="{{ $series->nome }}">
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

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('series.index') }}" class="btn">Cancelar</a>
    </form>
</x-layout>
