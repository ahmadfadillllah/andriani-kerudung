<div class="modal fade" id="detailProduk{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Nama Produk</label>
                                <input type="text" id="simpleinput" name="nama" class="form-control" value="{{ $item->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="example-select" class="form-label">Pilih Jenis</label>
                                <select class="form-select" id="example-select" name="jenisproduk_id">
                                    <option value="{{ $item->jenisproduk_id  }}" hidden>{{ $item->jenisproduk->nama  }}</option>
                                    @foreach ($jenis_produk as $jenis)
                                    <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Stok</label>
                                <input type="number" id="simpleinput" name="stok" value="{{ $item->stok }}" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Harga</label>
                                <input type="text" id="rupiahedit" name="harga" value="@currency($item->harga)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Update</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">

    var rupiah = document.getElementById('rupiahedit');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp');
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split   		= number_string.split(','),
        sisa     		= split[0].length % 3,
        rupiah     		= split[0].substr(0, sisa),
        ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
    }
</script>
