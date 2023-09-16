<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<div class="modal fade" id="tambahAlamat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Tambah Alamat</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('home.profile.alamat') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                        <div class="col-md-9">
                            @php
                                $provinces = new App\Http\Controllers\DependantDropdownController;
                                $provinces= $provinces->provinces();
                            @endphp
                            <select class="form-control" name="provinsi" id="provinsi" required>
                                <option>Pilih Salah Satu</option>
                                @foreach ($provinces as $item)
                                    <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                        <div class="col-md-9">
                            <select class="form-control" name="kota" id="kota" required>
                                <option>Pilih Salah Satu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                        <div class="col-md-9">
                            <select class="form-control" name="kecamatan" id="kecamatan" required>
                                <option>Pilih Salah Satu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" for="desa">Desa</label>
                        <div class="col-md-9">
                            <select class="form-control" name="desa" id="desa" required>
                                <option>Pilih Salah Satu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Alamat</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="alamat"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Tambah</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                $('#' + name).empty();
                $('#' + name).append('<option>Pilih Salah Satu</option>');

                $.each(data, function (key, value) {
                    $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                });
            }
        });
    }
    $(function () {
        $('#provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
        });
        $('#kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
        })
        $('#kecamatan').on('change', function () {

            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
        })
    });
</script>

