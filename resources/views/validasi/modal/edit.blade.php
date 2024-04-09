<div class="modal fade" id="editPengiriman{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update Pengiriman</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('validasi.update', $item->order_id) }}" method="post">
                    @csrf
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="example-select" class="form-label">Pilih Status Pengiriman</label>
                            <select class="form-select" id="example-select" name="statuspengiriman">
                                <option disabled selected>Pilih salah satu</option>
                                <option value="Sedang Dikemas">Sedang Dikemas</option>
                                <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                                <option value="Pesanan Selesai">Pesanan Selesai</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Update</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
