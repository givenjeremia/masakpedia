<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $artikels = Artikel::all();

        return view('frontend.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('frontend.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();
        $data = new Artikel();
        $data->judul = $request->get('judul');
        $data->url_gambar  = $request->get('url_artikel');
        $data->isi = $request->get('isi_artikel');
        $data->users_id = $user->id;
        $data->save();
        return redirect()->route('myartikel.index')->with('status', 'Success Create '.$request->get('judul').' Artikel' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($artikel)
    {
        //

        $artikel = Artikel::find($artikel);
        // dd($res);
        // dd($artikel);
        return view('frontend.artikel.show',['artikel'=>$artikel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($artikel)
    {
        //
        $artikel = Artikel::find($artikel);
        $this->authorize('artikel-permission');
        
        try {    
            $artikel->delete();
            return redirect()->route('myartikel.index')->with('status', 'Success Delete Artikel' );  
        } catch (\Throwable $th) {
            $msg = "Artikel Gagal Di Hapus. Pastikan Data Child SUdah Hilang Atau Tidak Behubungan";
            return redirect()->route('myartikel.index')->with('status', 'Error '.$msg );  
        }
    }

    public function myArtikel()
    {
        $this->authorize('artikel-permission');

        $user = Auth::user();
        $artikels = Artikel::where('users_id', $user->id)->paginate(6);
        return view('frontend.artikel.myartikel',compact('artikels'));

    }
}
