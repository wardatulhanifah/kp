

<div class="form-group">
	
	<label for="nama"> Nama</label>
	{{ Form::text('nama', Auth::user()->biodata->nama, ['class' => 'form-control', 'disabled'=>true]) }}
</div>
<div class="form-group">
<label for="nim"> NIM</label>
	{{ Form::text('nim', Auth::user()->biodata->nim, ['class' => 'form-control','disabled'=>true]) }}

</div>

<div class="form-group">

	<label for="role">Instansi</label>
    {{ Form::select('instansi', $instansi, null, ['class' => 'form-control'])}}
	
</div>

<!-- <div class="form-group">
	<label for="nama"> Lokasi KP </label>
	{{ Form::text('nama', null, ['class' => 'form-control']) }}
</div> -->

<div class="form-group">
	<label for="mulai_kp"> Tanggal Mulai</label>
	{{ Form::date('mulai_kp', (isset($proposal) && $proposal->mulai_kp ? $proposal->mulai_kp : date('d-m-Y')), ['class' => 'form-control']) }}
</div>

<div class="form-group">
	<label for="selesai_kp"> Tanggal Selesai</label>
	{{ Form::date('selesai_kp', (isset($proposal) && $proposal->selesai_kp ? $proposal->selesai_kp : date('d-m-Y')), ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <label for="judul">Judul</label>
    {{ Form::text('judul',null, ['class' => 'form-control'])}}
</div>
<div class="form-group">
    <label for="latar_belakang">Latar Belakang</label>
    {{ Form::textarea('latar_belakang',null, ['class' => 'form-control'])}}
</div>

<div class="form-group">
	<label for="rumusan"> Rumusan Masalah</label>
	{{ Form::textarea('rumusan', null, ['class' => 'form-control']) }}
</div>



