<div class="modal fade" id="editProduk{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit Gambar Produk</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('produk.updategambar', $item->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Gambar 1</label>
                                <input type="file" id="simpleinput" name="gambar1" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Gambar 2</label>
                                <input type="file" id="simpleinput" name="gambar2" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Gambar 3</label>
                                <input type="file" id="simpleinput" name="gambar3" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Gambar 4</label>
                                <input type="file" id="simpleinput" name="gambar3" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Submit</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

