<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class BaseController
{

    private $clazz;
    
    public function __construct($clazz) {
        $this->clazz = $clazz;
    }

    public function index(Request $request)
    {
        return $this->clazz::paginate($request->per_page);
    }

    public function store(Request $request)
    {
        return response()->json($this->clazz::create($request->all(), 201));
    }

    public function show($id)
    {
        $serie = $this->clazz::find($id);

        return response()->json(
            $serie,
            is_null($serie) ? 204 : 200
        );
    }

    public function update($id, Request $request)
    {
        $serie = $this->clazz::find($id);

        if (is_null($serie)) return response()->json(['error' => 'Not found'], 404);

        $serie->fill($request->all());
        $serie->save();

        return response()->json($serie, 200);
    }

    public function destroy($id)
    {
        $resources = $this->clazz::destroy($id);

        if ($resources === 0) return response()->json(['error' => 'Not found'], 404);

        return response()->json('', 204);
    }

}