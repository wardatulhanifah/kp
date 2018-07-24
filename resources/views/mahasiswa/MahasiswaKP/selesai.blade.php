 @extends('blank')

{{-- Menu Breadcrumb --}}
@section('breadcrumb')
	
@endsection


{{-- Content Utama --}}
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				{!! Form::open(['route' => 'selesai.kp', 'method' => 'post', 'files' => 'true', 'enctype' => 'multipart/form-data']) !!}
				<div class="card-header">
					<i class="fa fa-align-justify"></i> Selesai KP
				</div>
				<input type="hidden" name="proposal_id" value="{!! $id !!}">
				<div class="card-body">
					@include('mahasiswa.mahasiswakp._form')

				</div>
			</div>
			 <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Simpan</button>
               
              
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