<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\SuratMasuk;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratMasuks = SuratMasuk::get();
        $title = "Surat Masuk";
        $konf = Setting::first();

        return view('surat_masuk.index', compact('suratMasuks', 'title', 'konf'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role == "admin"){
            
            return redirect('/surat_masuk');
        }
        $title = "Tambah Surat Masuk";
        $konf = Setting::first();

        return view('surat_masuk.create', compact('title', 'konf'));
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
            'pengirim' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
            'file_path' => 'required: pdf,doc,docx',
        ], $message);

        $file_surat_masuk = $request->file('file_path');
        $namaFile = Str::slug($request->nomor_surat).date('Ymdhis').'.'.$request->file('file_path')->getClientOriginalExtension();
        $file_surat_masuk->move('file/surat_masuk/',$namaFile);

        $surtaMasuk = new SuratMasuk();
        $surtaMasuk->nomor_surat = $request->nomor_surat;
        $surtaMasuk->pengirim = $request->pengirim;
        $surtaMasuk->tanggal_surat = $request->tanggal_surat;
        $surtaMasuk->perihal = $request->perihal;
        $surtaMasuk->ringkasan = $request->ringkasan;
        $surtaMasuk->file_path = $namaFile;
        $surtaMasuk->save();
        return redirect()->route('surat_masuk.index')->with('sukses', 'Surat Masuk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suratMasuk = SuratMasuk::findorfail($id);
        $title = "Detail Surat Masuk";
        $konf = Setting::first();

        return view('surat_masuk.show', compact('suratMasuk', 'title', 'konf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suratMasuk = SuratMasuk::findorfail($id);
        $title = "Edit Surat Masuk";
        $konf = Setting::first();

        return view('surat_masuk.edit', compact('title', 'konf', 'suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $suratMasuk = SuratMasuk::findorfail($id);
        $namafile = $suratMasuk->file_path;
        $update = [
            'nomor_surat' => $request->nomor_surat, 
            'pengirim' => $request->pengirim,
            'tanggal_surat' => $request->tanggal_surat,
            'perihal' => $request->perihal,
            'ringkasan' => $request->ringkasan,
            'file_path' => $namafile,
        ];

        if ($request->file_path != ""){
            $request->file_path->move(public_path('file/surat_masuk/'), $namafile);
        }  

        $suratMasuk->update($update);
        return redirect()->route('surat_masuk.index')->with('sukses', 'Berhasil Mengubah Surat Masuk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suratMasuk = SuratMasuk::find($id);
        $namafile = $suratMasuk->file_path;
        $file_surat_masuk = public_path('file/surat_masuk/').$namafile;
        if(file_exists($file_surat_masuk)){
            @unlink($file_surat_masuk);
        }
        $suratMasuk->delete();
        return back()->with('sukses', 'Surat Masuk Berhasil Dihapus');
    }
}
