@extends('layouts.menuInicio')

@section('content')




  <!-- POPULAR POSTS -->
<div class="col-md-12 col-sm-6">

    <div class="box-flip box-icon box-icon-center box-icon-round box-icon-large text-center m-0">
        <div class="box-inner">
            <h4>
              IMAGENES
            </h4>

            <div class="container">


              <div class="masonry-gallery columns-5 clearfix lightbox" data-img-big="1" data-plugin-options='{"delegate": "a", "gallery": {"enabled": true}}'>


                  @foreach ($fotos as $foto)
                  @if (($foto->RIF_Prest) == ($user->RIF_Prest))
                  <a class="image-hover" href="{{asset('storage/imagen/foto/'.$foto->imagen)}}">
                    <img src="{{asset('storage/imagen/foto/'.$foto->imagen)}}" />
                  </a>
                  @endif
                  @endforeach

                </div>

            </div>
        </div>

    </div>

  </div>

@endsection
