<div class="modal fade" id="detailBundle{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Detail Bundle</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bundle.update', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Nama Bundle</label>
                                <input type="text" id="simpleinput" name="nama" value="{{ $item->nama }}" class="form-control" required>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="example-select" class="form-label">Pilih Produk</label>
                                <select class="form-select" id="example-select" name="bundle">
                                    <option hidden selected value="{{ $item->bundle }}">{{ $item->bundle }}</option>
                                    @foreach ($bundle as $pro)
                                    <option value="{{ $pro->id }}">{{ $pro->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Stok</label>
                                <input type="number" id="simpleinput" name="stok" value="{{ $item->stok }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Harga Asli</label>
                                <input type="text" id="hargaaslibundle" name="hargaasli" value="@currency($item->hargaasli)" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Harga Diskon</label>
                                <input type="text" id="rupiahbundle" name="harga" value="@currency($item->harga)" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Submit</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">

    var rupiah = document.getElementById('rupiahbundle');
    var hargaaslibundle = document.getElementById('hargaaslibundle');

    rupiah.addEventListener('keyup', function(e){
        rupiah.value = formatRupiah(this.value, 'Rp');
    });

    hargaaslibundle.addEventListener('keyup', function(e){
        hargaaslibundle.value = formatRupiah(this.value, 'Rp');
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
