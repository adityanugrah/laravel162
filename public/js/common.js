$(function () {
    // Initialize a Tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Highlight the current navbar equals to the current URL
    var url = window.location.href;

    if (url.indexOf('category') > -1)
    {
        $('a[href="/category"]').parent().addClass('active');
    }

    if (url.indexOf('product') > -1)
    {
        $('a[href="/product"]').parent().addClass('active');
    }

    if (url.indexOf('employee') > -1)
    {
        $('a[href="/employee"]').parent().addClass('active');
    }

    if (url.indexOf('supplier') > -1)
    {
        $('a[href="/supplier"]').parent().addClass('active');
    }

    if (url.indexOf('customer') > -1)
    {
        $('a[href="/customer"]').parent().addClass('active');
    }

    if (url.indexOf('shipper') > -1)
    {
        $('a[href="/shipper"]').parent().addClass('active');
    }

    if (url.indexOf('order') > -1)
    {
        $('a[href="/order"]').parent().addClass('active');
    }
});

// Before delete action is fired, do confirmation
$(document.body).on('click', '.delete-confirm', function(event) {
    event.preventDefault();
    var $form = $(this).closest('form');
    
    swal({
        title: 'Anda yakin ingin menghapus data ini?',
        text: "Data yang sudah dihapus tidak dapat dikembalikan!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dd3333',
        confirmButtonText: 'Ya, HAPUS',
        cancelButtonText: 'Batalkan',
        closeOnConfirm: false,
        width: 600
    }).then(function(isConfirm) {
        if (isConfirm) {
            $form.submit();

            // swal(
            //     'Deleted!',
            //     'Data berhasil dihapus',
            //     'success'
            // );
        }
    })
});