<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> 

    <strong>Aaarrgghh!</strong> 

    @if (strpos(session('pesan_gagal'), '1451') !== false)
        Data ini sudah dipakai dalam transaksi, sehingga tidak bisa dihapus.
    @else
        {{ session('pesan_gagal') }}
    @endif
</div>