@extends('layouts.app')

@section('title', 'Detail LandingPage | ')

@section('content')
<div class="main-content">
	<div class="card rounded rounded-4 border-0 p-4 shadow">
		<div class="card-header text-dark fw-bold d-flex justify-content-between align-items-center mt-2">
			<div class="h3 fw-bold">{{ $mLandingPage->name }}</div>
			<div>
				<a href="{{ $mLandingPage->domain }}" target="_blank" class="btn btn-primary fw-bold rounded rounded-2"><i class="fas fa-eye"></i></a>
				<a href="{{ route('deleteLandingPage', $mLandingPage->id) }}" id="delete-button" class="btn btn-danger fw-bold rounded rounded-2 ms-2"><i class="fas fa-trash"></i></a>
			</div>
		</div>
		<div class="card-body">
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script type="module">
	$(document).ready(function() {
		$('#delete-button').on('click', function(event) {
			event.preventDefault();
			const url = $(this).attr('href');
			Swal.fire({
				title: 'Konfirmasi?',
				text: "Kamu ingin menghapus ini?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Hapus',
				cancelButtonText: 'Batalkan'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = url;
				}
			});
		});
	});
</script>
@endpush
