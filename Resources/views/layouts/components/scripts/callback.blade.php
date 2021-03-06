var bool = false;
$('#check-all').click(function(){ 
     $(':checkbox').prop("checked", bool);
     bool = !bool;
});

$('input.pilihan:checkbox').change(function() {
    $('#delete-all-button').toggle($('input.pilihan:checkbox:checked').length>0)
});

$('#delete-all-button').on('click', function(e) {
    e.preventDefault();
    swal({
        title: 'Apa Anda Yakin?',
        html: 'Silahkan ketik kata <b>hapus</b> untuk melanjutkan.',
        type: 'warning',
        input: 'text',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        showLoaderOnConfirm: true,
        preConfirm: function (data) {
            return new Promise(function (resolve, reject) {
                setTimeout(function() {
                    if (data !== 'hapus') {
                        reject('Mohon masukkan sesuai dengan yang diperintahkan.')
                    } else {
                        resolve()
                    }
                }, 1000)
            })
        },
        allowOutsideClick: false
    }).then(function(data) {
        $("#submit-all").submit();
    })
});