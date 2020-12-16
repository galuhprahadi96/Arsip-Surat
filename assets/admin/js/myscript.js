// Add Alert Create, Update,
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal({
		title: 'Berhasil',
		text:  '' + flashData,
		type: 'success'
	});
}

// Tombol Hapus
$('.tombol-hapus').on('click', function(e) {

	e.preventDefault();
	const href = $(this).attr('href');

	Swal({
	  title: 'Apakah anda Yakin ?',
	  text: "Data Akan Di Hapus",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#00',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus Data !'
	}).then((result) => {
	   if (result.value) {
		    document.location.href = href;
		} 
	})

});