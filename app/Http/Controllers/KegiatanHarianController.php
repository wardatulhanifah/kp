<?php

namespace App\Http\Controllers;

use App\KegiatanHarian;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $user = Auth::user();       
            $kegiatan_harians = KegiatanHarian::paginate(10);
            $id_mhs = DB::table('mahasiswa_kp')->where('id_mahasiswa', $user['id'])->value('id');
            $harian_mahasiswas = KegiatanHarian::all()->where('id_mhs', '=', $id_mhs);
            
        

          // dd( $harian_mahasiswas);
            // dd( $harians);
            // $harian_mhs = DB::table('kegiatan_harian')->where('id', $user['id'])->value('id');
            // dd($harian_mhs);
            return view('mahasiswa.kegiatanharian.index_harian', compact('kegiatan_harians', 'user','mahasiswa_kp','harian_mahasiswas','harians'));
        
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
        $request->validate([
            'hari_tanggal' => 'required', 
            'kegiatan'  => 'required',
            'id'  => 'required'
        ]);

       
        $kegiatan_harian = new KegiatanHarian();
        $kegiatan_harian->hari_tanggal = $request->input('hari_tanggal');
        $kegiatan_harian->kegiatan = $request->input('kegiatan');
        $kegiatan_harian->id_mhs= $request->input('id');
        
        if($kegiatan_harian->save())
        {
            toast()->success('Kegiatan Harian berhasil ditambahkan');
           
            return redirect()->route('harian.index');
        }
        else
        {
            toast()->error('Data kegiatan_harian gagal ditambahkan');
            return redirect()->route('kegiatan_harian.index_harian');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KegiatanHarian  $kegiatanHarian
     * @return \Illuminate\Http\Response
     */
    public function show(KegiatanHarian $kegiatanHarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KegiatanHarian  $kegiatanHarian
     * @return \Illuminate\Http\Response
     */
    public function edit(KegiatanHarian $kegiatanHarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KegiatanHarian  $kegiatanHarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KegiatanHarian $kegiatanHarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KegiatanHarian  $kegiatanHarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(KegiatanHarian $kegiatanHarian)
    {
        //
    }
}
