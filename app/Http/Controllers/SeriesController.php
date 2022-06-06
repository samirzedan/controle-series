<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\EloquentSeriesRepository;
use App\Models\Series;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SeriesController extends Controller
{

    public function __construct()
    {
        $this->middleware(Autenticador::class)->except('index');
    }

    public function index() {
        $query = Series::orderBy('nome')
            ->join('users', 'series.user_id', '=', 'users.id')
            ->select(['series.*', 'users.name as user_name'])
            ->get();
        $series = Auth::user()->admin
            ? $query
            : $query->where('user_id', Auth::user()->id);

        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create() {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, EloquentSeriesRepository $repository) {

        $coverPath = $request->hasFile('cover')
            ? $request->file('cover')->store('series_cover', 'public')
            : null;

        $request->coverPath = $coverPath;

        $series = $repository->add($request);

        return redirect(route('series.index'))
        ->with('mensagem.sucesso', "Série '{$series->nome}' adicionada com sucesso");
    }

    public function update(Series $series, SeriesFormRequest $request) {
        $coverPath = $request->hasFile('cover')
        ? $request->file('cover')->store('series_cover', 'public')
        : null;

        $request->coverPath = $coverPath;

        $series->fill($request->all());
        $series->cover = $request->coverPath;

        $series->save();

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' atualziada com sucesso");
    }

    public function destroy(Series $series) {

        $series->delete();
        //$request->session()->flash('mensagem.sucesso', "Série '{$serie->nome}' removida com sucesso");

        return redirect()->route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit(Series $series) {

        return view('series.edit')->with('series', $series);

    }

}
