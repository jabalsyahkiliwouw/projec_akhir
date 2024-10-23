<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SuratKeluar;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratKeluar = SuratKeluar::get();
        $title = "Surat Keluar";
        $konf = Setting::first();

        return view('surat_keluar.index', compact('suratKeluar', 'title', 'konf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            
            return redirect('/surat_keluar');
        }
        $title = "Tambah Surat Keluar";
        $konf = Setting::first();

        return view('surat_keluar.create', compact('title', 'konf'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $message = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $request->validate([
            'nomor_surat' => 'required',
            'penerima' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'file_path' => 'required: pdf,doc,docx',
        ], $message);

        $file_surat_keluar = $request->file('file_path');
        $namaFile = Str::slug($request->nomor_surat).date('Ymdhis').'.'.$request->file('file_path')->getClientOriginalExtension();
        $file_surat_keluar->move('file/surat_keluar/',$namaFile);

        $suratKeluar = new SuratKeluar();
        $suratKeluar->nomor_surat = $request->nomor_surat;
        $suratKeluar->penerima = $request->penerima;
        $suratKeluar->tanggal_surat = $request->tanggal_surat;
        $suratKeluar->perihal = $request->perihal;
        $suratKeluar->ringkasan = $request->ringkasan;
        $suratKeluar->file_path = $namaFile;
        $suratKeluar->save();
        return redirect()->route('surat_keluar.index')->with('sukses', 'Surat Keluar Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suratKeluar = SuratKeluar::findorfail($id);
        $title = "Detail Surat Keluar";
        $konf = Setting::first();

        return view('surat_keluar.show', compact('suratKeluar', 'title', 'konf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suratKeluar = SuratKeluar::findorfail($id);
        $title = "Edit Surat keluar";
        $konf = Setting::first();

        return view('surat_keluar.edit', compact('title', 'konf', 'suratKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $suratKeluar = SuratKeluar::findorfail($id);
        $namafile = $suratKeluar->file_path;
        $update = [
            'nomor_surat' => $request->nomor_surat, 
            'penerima' => $request->penerima,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'ringkasan' => $request->ringkasan,
            'file_path' => $namafile,
        ];

        if ($request->file_path != ""){
            $request->file_path->move(public_path('file/surat_keluar/'), $namafile);
        }  

        $suratKeluar->update($update);
        return redirect()->route('surat_keluar.index')->with('sukses', 'Berhasil Mengubah Surat Keluar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suratKeluar = SuratKeluar::find($id);
        $namafile = $suratKeluar->file_path;
        $file_surat_keluar = public_path('file/surat_keluar/').$namafile;
        if(file_exists($file_surat_keluar)){
            @unlink($file_surat_keluar);
        }
        $suratKeluar->delete();
        
        return back()->with('sukses', 'Surat Keluar Berhasil Dihapus');
    }
}
