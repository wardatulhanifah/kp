@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    <a class="btn" href="{{ route('proposal.index') }}"><i class="icon-list"></i> List </a>
@endsection

{{-- Content Utama --}}
@section('content')
<div class="row"> 
    <div class="col-md-12"> 
        <div class="card">

            {!! Form::open(['route' => 'proposal.store', 'method' => 'post', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"> Tambah proposal</i>
            </div>

            <div class="card-body">

                @include('mahasiswa.isi_proposal._form_data')
                
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                <button class="btn btn-default" href="{{ route('tambah_anggota.add') }}">Tambah Anggota</button>
                
                <!-- <button class="btn btn-default" href="{{ route('tambah_anggota.add') }}">Default</button>
                <button class="btn" href="{{ route('tambah_anggota.add') }}"><i class="icon-list"></i> Tambah Anggota </button> -->
                 <!-- <button type="button" href="{{ route('tambah_anggota.add') }}" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                <button class="btn" href="{{ route('tambah_anggota.add') }}"><i class="icon-list"></i> List </button>
                 -->
              
            </div>

            {{ Form::close() }}

        </div>
    </div>
</div>
@endsection