<?php

namespace App\Http\Controllers;

use App\Resep;
use App\Kategori;
use App\KategoriAsalMasakan;
use Illuminate\Http\Request;
use App\KategoriJenisMasakan;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kategori = Kategori::all();
        // dd($kategori);
        return view('frontend.kategori.index',compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function asal($id)
    {
        //
        $asal = KategoriAsalMasakan::where('kategori_id',$id)->get();
        // dd($asal);
        return view('frontend.kategori.asal',compact('asal'));
    }
    public function jenis($id)
    {
        //
        $jenis = KategoriJenisMasakan::where('kategori_id',$id)->get();
        return view('frontend.kategori.jenis',compact('jenis'));
    }
    public function display($from,$id)
    {
        //
        $display = [];
        if($from == 'jenis'){
            $display = Resep::where('jenis_id', $id)->paginate(6);
        }
        else{
            $display = Resep::where('asal_id', $id)->paginate(6);
        }
        return view('frontend.kategori.display',compact('display'));
    }
}
