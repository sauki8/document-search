@extends('layout.template')

@section('content')
<div class="row">
    <div class="col-md-12">
        <ul class="list-unstyled">
          @foreach($documents as $document)
          <li class="media">
            <a href="{{url('dokumen/'.$document->dokumen)}}" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Pdf-2127829.png" height="50px" class="mr-3" alt="Gambar"></a>
            <div class="media-body">
              <h5 class="mt-0 mb-1">{{$document->judul}}</h5>
              <p>{{$document->deskripsi}}</p>
              <span class="badge badge-danger">Lokasi: {{$document->lokasi}}</span>
            </div>
          </li>
          <hr>
          @endforeach
        </ul>
    </div>
</div>
@endsection
