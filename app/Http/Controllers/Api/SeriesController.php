<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Model\Series;
use App\Models\Series as ModelsSeries;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $query = ModelsSeries::query();

        if($request->has('nome')) {
            //return $query->where('nome', $request->nome)->get();
            $query->where('nome', $request->nome);
        }

        return $query->paginate(5);
    }

    public function store(SeriesFormRequest $request) {
        return response()
            ->json(ModelsSeries::create($request->all()), 201);
    }
}
