$( function () {
	
	// Jika tombol tambah yg dipencet lakukan....
	$('.tombolTambahData') .on ('click', function () {
		$('#judulModal').html('Tambah data anime')
		$('.modal-footer button[type=submit]').html('Tambah data')		
		$('.modal-body form') .attr('action', 'http://localhost/phpmvc/public/Anime/tambah')

		$.ajax({
			url: 'http://localhost/phpmvc/public/Anime/tambah',
			success: function() {
				// console.log(data)
				$('#judul').val('')
				$('#genre').val('')
				$('#rating').val('')
				$('#sinopsis').val('')
				$('#id').val('')
			}
		})		
	})

	
	// Jika tombol edit yg dipencet lakukan....
	$('.tombolUbahData') .on ('click', function () {
		$('#judulModal').html('Edit data anime')
		$('.modal-footer button[type=submit]').html('Ubah data')

		$('.modal-body form') .attr('action', 'http://localhost/phpmvc/public/Anime/ubah')		
	
		const id = $(this).data('id');

		$.ajax({
			url: 'http://localhost/phpmvc/public/Anime/getubah',
			data: {id : id},
			method: 'post',
			dataType: 'json',
			success: function(data) {
				// console.log(data)
				$('#judul').val(data.judul)
				$('#genre').val(data.genre)
				$('#rating').val(data.rating)
				$('#sinopsis').val(data.sinopsis)
				$('#id').val(data.id)
			}
		})
	})

	// Jika tombol close di-tekan
	$('.modal-footer button[type=button]') .on('click', function() {
		
	})


} )