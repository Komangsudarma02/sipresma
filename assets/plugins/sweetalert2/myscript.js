const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal.fire({
        toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
      title: flashData + '!'
      });
}
// tombol-hapus
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();   //mematikan fungsi default
    const hapus = $(this).attr('href');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            document.location.href = hapus;
            // console.log(hapus);
        }
    })
});