<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $response = Http::post(env('API_URL').'wishes', [
            'name'  => $request->name,
            'from' => 'Tamu',
            'wish'  => $request->wish,
            'anonymous' => $request->anonymous ?? false,
            'wedding_id' => decode_id($request->wedding_id),
        ]);
        dd($response->object());

        if($response->failed()){
            $errors = $response->object()->errors;
            return back()->withErrors($errors ?? null)->withInput();
        }

        return back()->with('success', 'Pesan Berhasil Dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
