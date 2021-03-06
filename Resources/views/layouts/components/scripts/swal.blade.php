<script>
	function modalHapus(i) {
		swal({
			title: 'Apa Anda Yakin?',
			html: 'Data ini akan kami hapus dari sistem.',
			type: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Yakin',
			cancelButtonText: 'Batalkan',
		}).then(function(data) {
			$.ajax({
				type: 'DELETE',
				url: '{{ route("$prefix.index") }}' + '/' + i,
				data: {
					"id": i,
					"_token": $('meta[name="csrf-token"]').attr('content'),
				},
				success: function(data){
					if(data == "success") {
						@isset($redirect)
							location.href = '{!! $redirect !!}';
						@else
							history.go(0);
						@endisset
					} else {
						swal({
							type: 'warning',
							title: 'Galat!',
							html: 'Terjadi kesalahan saat menghapus data. Coba sekali lagi.'
						});
					}
				}
			});
		})
	}
</script>