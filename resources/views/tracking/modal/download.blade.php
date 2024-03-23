<div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Filter Date</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('tracking.download') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="example-date" class="form-label">Start Date</label>
                        <input class="form-control" id="example-date" type="date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="example-date" class="form-label">End Date</label>
                        <input class="form-control" id="example-date" type="date" name="end_date" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Download</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
