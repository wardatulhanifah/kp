@extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
    
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row"> 
    <div class="col-md-12"> 
        <div class="card">

            {!! Form::open(['route' => 'harian.store', 'method' => 'post', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}

            <div class="card-header">
                <i class="fa fa-align-justify"> Tambah Kegiatan Harian</i>
            </div>

            <div class="card-body">

                @include('mahasiswa.kegiatanharian._form')
                
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
                
            </div>

            {{ Form::close() }}

        </div>
    </div>
    <div class="col-md-12">
        <div class="card" style="overflow-x: auto">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Daftar kegiatan harian
            </div>

            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                        <tr>
                           
                            <th class="text-center">Hari/Tanggal</th>
                            <th class="text-center">Kegiatan</th>
                            <th class="text-center">Aksi</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatan_harians as $kegiatan_harian)
                        <tr>
                           
                            <td> {{ $kegiatan_harian->hari_tanggal }} </td>
                            <td> {{ $kegiatan_harian->kegiatan }} </td>
                            
                            <td class="text-center">
                                <a href=" {{route('harian.show', [$kegiatan_harian->id])}} " class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
                                <a href=" {{route('harian.edit', [$kegiatan_harian->id])}} " class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil"></i></a>
                                <button onclick = "event.preventDefault();confirmDelete('{{ route('harian.destroy', [$kegiatan_harian->id]) }}');" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            <div class="card-footer">
                {{ $kegiatan_harians->links() }}
            </div>
        </div>
    </div>
</div>

<form style="display: none" action="#" method="post" id="form-delete">
    @csrf
    @method('delete')
</form>


@endsection

@push('javascript')
<script>
    function confirmDelete(url)
    {
        if(confirm('Anda yakin akan menghapus data kegiatan_harian ini?'))
        {
            form = document.querySelector('#form-delete');
            form.action = url;
            form.submit();
        }
    }
</script>

@endpush