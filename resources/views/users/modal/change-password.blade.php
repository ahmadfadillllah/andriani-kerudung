<div class="modal fade" id="changePassword{{ $us->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Update Password</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.changepassword', $us->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Password Baru</label>
                        <input type="password" id="simpleinput" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Update</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
