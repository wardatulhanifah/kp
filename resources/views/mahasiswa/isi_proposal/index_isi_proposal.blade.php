@extends('blank')

{{-- Menu Breadcrumb --}} 
@section('breadcrumb')
	<a class="btn" href="{{ route('proposal.create') }}"><i class="icon-plus"></i> Tambah</a>
@endsection

{{-- Content Utama --}}
@section('content')

<div class="row"> 
	<div class="col-md-12">
		<div class="card" style="overflow-x: auto">
			<div class="card-header">
				<i class="fa fa-align-justify"></i> Daftar proposal
			</div>

			<div class="card-body">
				<table class="table table-responsive-sm table-bordered">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Judul</th>
							<th class="text-center">Instansi</th>
							<th class="text-center">Status</th>
							<th class="text-center">Aksi</th>							
						</tr>
					</thead>
					<tbody>
						@foreach($proposals as $proposal)
						<tr>
							<td> {{ $proposal->id}} </td>
							<td> {{ $proposal->judul }} </td>
							<td> {{ $proposal->instansi['nama'] }} </td>
							<td> {{ $proposal->status_p['status']}} </td>
							
							<td class="text-center">
								<a href=" {{route('proposal.show', [$proposal->id])}} " class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>
								<a href=" {{route('proposal.edit', [$proposal->id])}} " class="btn btn-sm btn-outline-warning"><i class="fa fa-pencil"></i></a>
								<button onclick = "event.preventDefault();confirmDelete('{{ route('proposal.destroy', [$proposal->id]) }}');" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				
			</div>
			<div class="card-footer">
				{{ $proposals->links() }}
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
		if(confirm('Anda yakin akan menghapus data proposal ini?'))
		{
			form = document.querySelector('#form-delete');
			form.action = url;
			form.submit();
		}
	}
</script>

@endpush