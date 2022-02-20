@extends('data_master')
@section('content-data-master')

<div class="card">
    <div class="card-body">
        <form action="{{ url('setting/company') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="icon">Logo</label>
                <input type="file" accept="img/*" id="file" name="file" class="form-control @error('fil') is-invalid @enderror" required>
                <div class="invalid-feedback">
                    Mohon isi file dengan benar.
                </div>
                <small class="form-text text-muted">Maksimal 2MB.</small>
            </div>
            <div class="form-group">
                <label for="nama perusahaan">Nama Perusahaan</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                <div class="invalid-feedback">
                    Mohon isi nama perusahaan dengan benar.
                </div>
            </div>
            <div class="form-group">
                <label for="">No. Telpon Perusahaan</label>
                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" required>
                <div class="invalid-feedback">
                    Mohon isi nomor telpon dengan benar.
                </div>
            </div>
            <div class="form-group">
                <label for="">Email Perusahaan</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                <div class="invalid-feedback">
                    Mohon isi email dengan benar.
                </div>
            </div>
            <div class="form-group">
                <label for="">Alamat Perusahaan</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="name" name="alamat" required>
                <div class="invalid-feedback">
                    Mohon isi alamat dengan benar.
                </div>
            </div>
            <button type="submit" id="formSubmit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

@endsection
@section('extra-script')
    <script src="{{asset('assets/js/examples/file-manager.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master_setting.js')}}"></script>
    <script src="{{asset('assets/js/custom/data_master.js')}}"></script>
@endsection
