<?php

namespace App\Http\Controllers;

use App\MahasiswaKP;
use Illuminate\Http\Request;
use App\Instansi; 
use App\Mahasiswa; 
use App\Proposal;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\User;
 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Image;
use File;


class MahasiswaKPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $user = Auth::user();
        $mahasiswa_kp = new MahasiswaKP();
        $instansi = Instansi::all()->pluck('nama', 'id');
        $proposal= Proposal::all();
       
        $mahasiswa = Mahasiswa::all()->pluck('nama', 'id');
        return view('mahasiswa.mahasiswakp.selesai', compact('instansi','mahasiswa','proposal','mahasiswa_kp'));

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
     * @param  \App\MahasiswaKP  $mahasiswaKP
     * @return \Illuminate\Http\Response
     */
    public function show(MahasiswaKP $mahasiswaKP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MahasiswaKP  $mahasiswaKP
     * @return \Illuminate\Http\Response
     */
    public function edit(MahasiswaKP $mahasiswaKP)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MahasiswaKP  $mahasiswaKP
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MahasiswaKP $mahasiswaKP)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MahasiswaKP  $mahasiswaKP
     * @return \Illuminate\Http\Response
     */
    public function destroy(MahasiswaKP $mahasiswaKP)
    {
        //
    }

    public function selesai($id)
    {
        
        $mahasiswa_kp=MahasiswaKP::find($id);
         $proposal=$mahasiswa_kp->proposal;
         $instansi=$proposal->intansi;
         $anggotas=$proposal->mahasiswas;
       
       
        return view('mahasiswa.mahasiswakp.selesai', compact('instansi','mahasiswa_kp','proposal','anggotas'));
    }

    public function selesaiSave(Request $request,$id)

    {

         $mahasiswa_kp=MahasiswaKP::find($id);
         $proposal=$mahasiswa_kp->proposal;
         $instansi=$proposal->intansi;
         $anggotas=$proposal->mahasiswas;
         $mahasiswa_kp = MahasiswaKP::find($id)->where('id_proposal',$request->proposal_id)->first();
         $mahasiswa_kp->judul_laporan=$request->input('judul_laporan');
         $mahasiswa_kp->status = 5;
         $mahasiswa_kp->save();

        return redirect(route('proposal.index'));

    }
}

        