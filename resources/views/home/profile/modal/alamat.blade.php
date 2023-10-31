<div class="modal fade" id="tambahAlamat"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                @foreach ($provinces as $prov)
                                    <option value="{{ $prov['province_id']}}">{{ $prov['province']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                        <div class="col-md-9" id="kota"></div>
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Alamat</label>
                        <textarea class="form-control" id="example-textarea" rows="5" name="alamat" required></textarea>
                        <p style="color:orange">mohon mengisi alamat lengkap agar kurir tidak kebingungan</p>
                    </div>
                    @if (!in_array(true, $alamat_utama))
                        <div class="mb-3">
                            <label for="example-textarea" class="form-label">Jadikan sebagai alamat utama?</label>
                            <div class="form-check col-md-3">
                                <input class="form-check-input" type="radio" name="utama" value="true" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  Ya
                                </label>
                              </div>
                              <div class="form-check col-md-3">
                                <input class="form-check-input" type="radio" name="utama" value="false" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                  Tidak
                                </label>
                              </div>
                        </div>
                    @endif

                    <button type="submit" class="btn btn-outline-primary waves-effect waves-light">Tambah</button>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function onChangeSelect(url, id, name) {
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
               $('#' + name).empty();
                let option ='<select name="'+name+'" id="'+name+'" class="form-control" required>';
                $.each(data, function (key, value) {
                   option +='<option value="' + key + '">' + value + '</option>';
                });
                option +="</select>"
                $("#"+name).append(option);
            }
        });
    }

    $(function () {
        $('#provinsi').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
        });
    });
</script>


