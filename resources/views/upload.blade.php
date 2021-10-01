@extends('layout.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <form method="post" action="{{url('upload-action')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-header">Form Upload Dokumen</div>
                <div class="card-body">
                      <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                      </div>
                      <div class="form-group">
                        <label for="dokumen">Dokumen</label>
                        <input type="file" class="form-control" id="dokumen" name="dokumen" required>
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deksripsi singkat</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                      </div>
                </div>
                <div class="card-footer p-1">
                    <button type="submit" class="m-0 btn btn-success btn-block">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
