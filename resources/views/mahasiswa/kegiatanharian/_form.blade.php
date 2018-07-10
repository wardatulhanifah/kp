<div class="form-group">
    <label for="id"></label>
    {{ Form::hidden('id', $user->biodata->mahasiswa_kp[0]->id, ['class' => 'form-control'])}}
    <!-- {!! Form::input('hari_tanggal','start_date',date('Y-m-d'),['class' => 'form-control','disabled'=>true]) !!} -->
</div>

<div class="form-group">
    <label for="hari_tanggal">Hari/Tanggal</label>
    {{ Form::date('hari_tanggal',null, ['class' => 'form-control'])}}
    <!-- {!! Form::input('hari_tanggal','start_date',date('Y-m-d'),['class' => 'form-control','disabled'=>true]) !!} -->
</div>

<div class="form-group">
	<label for="kegiatan"> Kegiatan</label>
	{{ Form::text('kegiatan', null, ['class' => 'form-control']) }}
</div>

