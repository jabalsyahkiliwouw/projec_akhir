<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;

use Illuminate\Http\Request;


class DahsboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konf = Setting::first();
        $suratMasuk = SuratMasuk::count();
        $suratKeluar = SuratKeluar::count();
        $title = "Dashboard";

        return view('dashboard.index', compact('konf', 'title', 'suratMasuk', 'suratKeluar'));
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
