<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Resep;
use App\Langkah;
use App\UserAktivitasResep;
use App\KategoriAsalMasakan;
use Illuminate\Http\Request;
use App\KategoriJenisMasakan;
use Illuminate\Support\Facades\Auth;

class ResepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $userAktivitasResep = Useraktivitasresep::all();
        $cari = !empty($request->get('cari'))  ? $request->get('cari') : ''; 
        $reseps = Resep::where('nama', 'LIKE', '%'.$cari.'%')->paginate(6);
        return view('frontend.resep.index',compact('reseps','userAktivitasResep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->authorize('resep-permission');
        $asal_kategori = KategoriAsalMasakan::all();
        $jenis_kategori = KategoriJenisMasakan::all();
        return view('frontend.resep.create',compact('asal_kategori', 'jenis_kategori'));
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
        $data = new Resep();
        $data->nama = $request->get('judul');
        $data->url_gambar = $request->get('url_masakan');
        $data->deskripsi = $request->get('deskripsi');
        $data->asal_id = $request->get('asal');
        $data->user_id = $user->id;
        $data->jenis_id = $request->get('jenis');
        $data->save();

        $new_id = $data->id;

        foreach($request->get('bahan') as $bahans) 
        {
            $bahan = new Bahan();
            $bahan->resep_id = $new_id;
            $bahan->nama = $bahans;
            $bahan->save();
        }
        foreach($request->get('langkah') as $langkahs) 
        {
            foreach($request->get('url_langkah') as $url_langkah) 
            {
                $langkah = new Langkah();
                $langkah->keterangan = $langkahs;
                $langkah->resep_id = $new_id;
                $langkah->url_gambar =$url_langkah;
                $langkah->save();
                
            }
        }
        return redirect()->route('my_resep.index')->with('status', 'Success Create '.$request->get('judul').' Resep' );

        // dd($request->get('bahan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function show(Resep $resep)
    {
        //
        return view('frontend.resep.show', [
            'resep'=>$resep
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function edit(Resep $resep)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resep $resep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resep  $resep
     * @return \Illuminate\Http\Response
     */
    public function destroy($resep)
    {
        //
        $resep = Resep::find($resep);
      
        $this->authorize('resep-permission',$resep);
        // dd($resep);
        // $bahan->delete();
        
        try {
            $bahan = Bahan::whereIn('resep_id',$resep)->delete();
            $langkah = Langkah::whereIn('resep_id',$resep)->delete();
            // foreach($bahan as $item) {
            //     $item->delete();
            // }
            
            // foreach($langkah as $item) {
            //     $item->delete();
            // }
            // $bahan->delete();
            // $langkah->delete();
            $resep->delete();
            return redirect()->route('my_resep.index')->with('status', 'Success Delete Resep' );  
        } catch (\Throwable $th) {
            $msg = "Resep Gagal Di Hapus. Pastikan Data Child SUdah Hilang Atau Tidak Behubungan";
            return redirect()->route('my_resep.index')->with('status', 'Error '.$msg );  
        }
    }

    public function myResep()
    {
        $this->authorize('resep-permission');
        $userAktivitasResep = Useraktivitasresep::all();
        $user = Auth::user();
        // dd($user->id);
        $reseps = Resep::where('user_id', $user->id)->paginate(6);
        // dd($reseps);
        
        return view('frontend.resep.index',compact('reseps','userAktivitasResep'));

    }

    public function sukai($id)
    {
        // $this->authorize('resep-permission');
        $user = Auth::user();
        $userAktivitasResep = new UserAktivitasResep();
        $userAktivitasResep->user_id = $user->id;
        $userAktivitasResep->resep_id = $id;
        $userAktivitasResep->suka = '1';
        $userAktivitasResep->save();
        //Update Jumlah Suka
        $resep = Resep::find($id);
        $jum_suka = $resep->sukai;
        $resep->sukai = $jum_suka+1;
        $resep->save();
        return redirect()->route('my_resep.index')->with('status', 'Success Sukai Resep' ); 

    }



    

}
