<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Instansi; 
use App\Mahasiswa; 
use App\MahasiswaKP; 
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Image;
use File;

class proposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        if(Auth::user()->can('isi_proposal')){
            $proposals = Proposal::paginate(10);
       
            return view('mahasiswa.isi_proposal.index_isi_proposal', compact('proposals'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
         $instansi = Instansi::all()->pluck('nama', 'id');

       
        return view('mahasiswa.isi_proposal.create_isi_proposal', compact('instansi'));
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
            'instansi' => 'required',
            'mulai_kp'       => 'required',
            'selesai_kp'       => 'required',
            'judul' => 'required',
            'latar_belakang'       => 'required',
            'rumusan'       => 'required' 
        ]);
        
        //$id_instansi =  DB::table('instansi')->where('nama',  trim($request->input('instansi')))->pluck('id')->first();
        //dd($id_instansi);
        //dd(trim($request->input('instansi')));

        $proposal                 = new Proposal();
        $proposal->instansi_id           = $request->input('instansi');
        //$proposal->instansi_id           = $id_instansi;
        $proposal->mulai_kp           = $request->input('mulai_kp');
        $proposal->selesai_kp  = $request->input('selesai_kp');
        $proposal->judul           = $request->input('judul');
        $proposal->latar_belakang  = $request->input('latar_belakang');
        $proposal->rumusan  = $request->input('rumusan');
        
        if($proposal->save())
        {
            $mahasiswa_kp = new MahasiswaKP();
            $mahasiswa_kp->id_mahasiswa= Auth::user()->id;
            $mahasiswa_kp->id_proposal=$proposal->id;
            $mahasiswa_kp->save();
            toast()->success('Data proposal berhasil ditambahkan');
           
            return redirect()->route('proposal.index');
        }
        else
        {
            toast()->error('Data proposal gagal ditambahkan');
            return redirect()->route('proposal.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $instansi = Instansi::all()->pluck('nama', 'id');
         $proposal= Proposal::find($id);

        return view('mahasiswa.isi_proposal.show_isi_proposal',compact('proposal','instansi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);
         return view('mahasiswa.isi_proposal.edit_isi_proposal', compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
          $request->validate([
           'judul' => 'required',
            'latar_belakang'       => 'required',
            'rumusan'       => 'required'
        ]);
        $proposal                  = Proposal::find($id);
        $proposal->judul           = $request->input('judul');
        $proposal->latar_belakang  = $request->input('latar_belakang');
        $proposal->rumusan  = $request->input('rumusan');
        
        if($proposal->save())                    
        {
            toast()->success('Data proposal berhasil diperbaharui');
           
            return redirect()->route('proposal.index');
        }
        else
        {
            toast()->error('Data proposal gagal diperbaharui');
            return redirect()->route('proposal.edit', ['id' => $proposal->id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proposal = proposal::find($id);
        $proposal->delete();
        $user = User::find($id);
        

        $user->delete();
        toast()->success('Data proposal berhasil dihapus');

        return redirect()->route('proposal.index');
    }

    public function tambah_anggota()

    {
        $user = Auth::user();
        $mahasiswa_kp = new MahasiswaKP();
        $proposals = Proposal::all();
        $mahasiswas = Mahasiswa::all();
        $mahasiswa = Mahasiswa::all()->pluck('nama', 'id');


        //dd($user['id']);
        $id_proposal = DB::table('mahasiswa_kp')->where('id_mahasiswa', $user['id'])->value('id_proposal');
        $id_anggotas = MahasiswaKP::all()->where('id_proposal', '=', $id_proposal);
        $anggotas = array();
        dd($id_anggotas);
        //dd($mahasiswas);
        foreach ($mahasiswas as $key => $value) {
            foreach ($id_anggotas as $k => $v) {
                if ($id_anggotas[$k]->id_mahasiswa == $mahasiswas[$key]->id) {
                    $anggotas[$key]['id'] = $id_anggotas[$k]->id;
                    $anggotas[$key]['id_mhs'] = $mahasiswas[$key]->id;
                    $anggotas[$key]['nim'] = $mahasiswas[$key]->nim;
                    $anggotas[$key]['nama'] = $mahasiswas[$key]->nama;
                }
            }
        }
        //dd($anggotas);
        //dd($id_anggotas[1]->id_mahasiswa);

        return view('mahasiswa.isi_proposal.tambah_anggota', compact('mahasiswa', 'id_proposal', 'anggotas','mahasiswa_kp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedata(Request $request)
    {
          $request->validate([
            'id' => 'required',
            'mahasiswa'       => 'required',
            
        ]);
        
        //$id_instansi =  DB::table('instansi')->where('nama',  trim($request->input('instansi')))->pluck('id')->first();
        //dd($id_instansi);
        //dd(trim($request->input('instansi')));

        $mahasiswa_kp = new MahasiswaKP();
            $mahasiswa_kp->id_mahasiswa= $request->input('mahasiswa');
            $mahasiswa_kp->id_proposal=$request->input('id');
            $mahasiswa_kp->save();

       
        
        if($mahasiswa_kp->save())
        {
            toast()->success('Anggota berhasil ditambahkan');
           
            return redirect()->route('proposal.index');
        }
        else
        {
            toast()->error('Anggota gagal ditambahkan');
            return redirect()->route('proposal.create');
        }
    }

    public function hapus_anggota($id)
    {
        $mahasiswa_kp = MahasiswaKP::find($id);
        // dd($mahasiswa_kp);
        $mahasiswa_kp->delete();
       
        toast()->success('anggota berhasil dihapus');

        return redirect()->route('tambah_anggota.add');

    }

}
