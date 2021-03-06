 @extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
	<a class="btn" href="{{ route('proposal.destroy', [ $proposal->id ]) }}" onclick="event.preventDefault();confirmDelete();"><i class="icon-trash"></i> Hapus</a>
	<a class="btn" href="{{ route('tambah_anggota.add', [$proposal->id]) }}"><i class="icon-list"></i> Edit Anggota</a>
	<a class="btn" href="{{ route('proposal.edit', [$proposal->id]) }}"><i class="icon-list"></i> Edit Proposal</a>
	<a class="btn" href="{{ route('proposal.index') }}"><i class="icon-list"></i> List</a>

	<form style="display: none" action=" {{route('proposal.destroy', [$proposal->id])}} " method="post" id="form-delete">
		@csrf
		@method('delete')
	</form>

@endsection


{{-- Content Utama --}}
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Informasi Mahasiswa
				</div>

				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Nama </label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{Auth::user()->biodata->nama}}
								</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Nim </label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{Auth::user()->biodata->nim}}
								</p> 
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Anggota Kelompok</label>
							<div class="col-md-9">
							
									
									<table  border="0">
					                    <thead>
					                      : 
					                    </thead>
					                    <tbody>
					                        @foreach($anggotas as $anggota)
					                         
					                        <tr>
					                            <td>{{ optional($anggota->mahasiswa_kp)->nama }} </td>
					                        </tr>
					                        @endforeach
					                    </tbody>
					                </table>
								
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Instansi KP</label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{ $proposal->instansi['nama'] }}
								</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Lokasi KP </label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{ $proposal->instansi['lokasi'] }}
									
								</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Status Proposal </label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{ $proposal->status_p['status']}}
									
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Proposal Kerja Praktek
				</div>

				<div class="card-body">
					<form action="" method="post">
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Judul</label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{$proposal->judul }}
								</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Latar Belakang</label>
							<div class="col-md-9">
								

								<p class="col-form-label">
									: {{$proposal->latar_belakang}}
								</p>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-md-3 col-form-label"> Rumusan Masalah</label>
							<div class="col-md-9">
								<p class="col-form-label">
									: {{$proposal->rumusan }}
									
								</p>
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>

	</div>
@endsection

@push('javascript')
<script type="text/javascript">
	function confirmDelete()
	{
		if(confirm('Anda yakin akan menghapus proposal ini?'))
		{
			form = document.querySelector('#form-delete');
			form.submit();
		}
	}
</script>
@endpush