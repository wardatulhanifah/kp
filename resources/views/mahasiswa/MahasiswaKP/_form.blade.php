<div class="form-group">
	
	<label for="nama"> Nama</label>
	{{ Form::text('nama', Auth::user()->biodata->nama, ['class' => 'form-control', 'disabled'=>true]) }}
</div>
<div class="form-group">
<label for="nim"> NIM</label>
	{{ Form::text('nim', Auth::user()->biodata->nim, ['class' => 'form-control','disabled'=>true]) }}

</div>
<div class="form-group">
<label for="judul"> Judul Laporan</label>
	{{ Form::text('judul_laporan', null, ['class' => 'form-control']) }}

</div>
<div class="form-group">
    <label for="tanda_terima">Tanda Terima Laporan</label>
    {{ Form::file('tanda_terima_laporan', ['class' => 'form-control']) }}
</div>

