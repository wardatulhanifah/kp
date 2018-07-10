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

