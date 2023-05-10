<?php

namespace App\Http\Controllers;

use App\Http\Resources\SkiResource;
use App\Models\Ski;
use Illuminate\Http\Request;

class SkiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skis = Ski::all();

        return SkiResource::collection($skis);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ski $ski)
    {
        return new SkiResource($ski);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ski $ski)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ski $ski)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ski $ski)
    {
        //
    }
}
