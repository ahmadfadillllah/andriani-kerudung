<div class="modal fade" id="editUsers{{ $us->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Edit User</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $us->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Nama</label>
                        <input type="text" id="simpleinput" name="name" class="form-control" value="{{ $us->name }}" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="simpleinput" class="form-label">Email</label>
                        <input type="text" id="simpleinput" name="email" class="form-control" value="{{ $us->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Username</label>
                        <input type="text" id="simpleinput" name="username" class="form-control" value="{{ $us->username }}" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">No. Handphone</label>
                        <input type="text" id="simpleinput" name="no_hp" class="form-control" value="{{ $us->no_hp }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Role</label>
                        <select class="form-select" id="example-select" name="role">
                            <option value="{{ $us->role }}" selected>{{ $us->role }}</option>
                            <option value="karyawan">Karyawan</option>
                            <option value="owner">Owner</option>
                            <option value="pembeli">Pembeli</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Status Enabled</label>
                        <select class="form-select" id="example-select" name="statusenabled">
                            <option value="{{ $us->statusenabled }}" selected>{{ $us->statusenabled == 1 ? 'Aktif' : 'Non Aktif' }}</option>
                            <option value="true">Aktifkan</option>
                            <option value="false">No Aktifkan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-select" class="form-label">Tipe Akun</label>
                        <select class="form-select" id="example-select" name="tipe">
                            <option value="{{ $us->tipe }}" selected>{{ $us->tipe == 'vip' ? 'VIP' : 'Biasa' }}</option>
                            <option value="vip">VIP</option>
                            <option value="null">Biasa</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Update</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
