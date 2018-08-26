@extends('layouts.main')

@section('content')
    <meta charset="utf-8">
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Vesti</h4>
            </div>
            <div class="modal-body">
                <p>{!! $popUp->text !!}</p>
            </div>
        </div>
    </div>
</div>
<!-- Content section -->
<section class="main">

    <!-- Home content -->
    <section class="home">

        <!-- Promos -->
        <section class="galerija-top">
            <img src="{{ asset('assets/img/vesti-big.png')}}" alt="Vesti">
        </section>
        <!-- End class="promos" -->

        <!-- Promos -->
        <section class="vesti-content" id="vesti">
            <div class="container">
                @foreach($news as $key=>$one)
                @if($key % 3 == 0 || $key == 0)
                <div class="row">
                    @endif
                    <div class="span4">
                        <div class="vesti-box">
                            <div class="gallery-img">
                                <a href="{{route('vest',$one->slug)}}">
                                    <img src="{{ Image::load('gallery/' . $one->main_image, ['h' => 10]) }}">
                                </a>
                            </div>
                            <div class="vesti-info">
                                <h2><a href="{{route('vest',$one->slug)}}"> {!! $one->head !!}</a></h2>
                                <span class="vesti-datum">{{ $one->created_at }}</span>
                                <p>
                                    {!! substr($one->desc,0,30) !!}...
                                </p>
                                <a href="{{route('vest',$one->slug)}}">SAZNAJ VIŠE &rarr;</a><br/>
                                <hr/>
                            </div>
                        </div>
                    </div>
                    @if(($key+1) % 3 == 0 )
                </div>
                @endif
                @endforeach

                <div class="row">
                    <div class="span12">
                        <div class="paging">
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End class="promos" -->

    </section>
    <!-- End class="home" -->

</section>
<!-- End class="main" -->

@stop
