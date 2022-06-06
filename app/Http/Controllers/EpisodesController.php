<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season) {
        return view('episodes.index', [
            'episodes' => $season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season) {
        $watchedEpisodes = $request->episodes;
        if($watchedEpisodes === null) {
            $watchedEpisodes = [];
        }
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->watched = in_array($episode->id, $watchedEpisodes);
        });
        $season->push();

        return redirect()->route('episodes.index', $season->id)->with('mensagem.sucesso', 'Status de episódio(s) atualizado(s)!');
    }
}
