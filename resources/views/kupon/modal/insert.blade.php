<div class="modal fade" id="insertKupon" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Kupon</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kupon.insert') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Kode</label>
                        <input type="text" id="simpleinput" style="text-transform:uppercase" name="kode" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Diskon</label>
                        <input type="number" id="simpleinput" step="0.01" name="diskon" class="form-control" required>
                        <p style="color: orange">example : 0.03</p>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Submit</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
