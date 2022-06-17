@extends('layouts.applayout')
@section('content')
<div class="main">
    <div class="container-fluid">
        <!------------------------------------------------- NOMBRE DE LA EDICIÓN ------------------------------------------------------------>
            <div class="edition_title">
            <br>
                <h4><b>{{ App::isLocale('es')?$editions->edition_title:$editions->edition_title_en }}</b></h4>
            </div>
        <hr>
        <div class="row">
    <!------------------------------------------------- portada ------------------------------------------------------------>
            <div class="col-12 .col-sm-12 col-md-6 .col-lg-6 .col-xl-6">
            <br>
                <div class="edition-cover">
                    <img src="{{ asset('images/'.$editions->edition_route_image) }}" style="display:block; width: 92%; margin:0 auto;">
                </div>
            </div>

    <!------------------------------------------------- BARRA LATERAL ------------------------------------------------------------>
            <div class="col-12 .col-sm-12 col-md-6 .col-lg-6 .col-xl-6" id="popular">
                <div class="list-group">
                    <!-- titulo -->
                    <div class="list-group-item list-group-item-action" id="popular_header_barside">
                        <div class="d-flex w-100 justify-content-between">
                            <h5><b>@lang('data.indice')</b></h5>
                            <i class="fas fa-list"></i>
                        </div>
                    </div>
                    <!-- articulos populares -->
                    @foreach($editions->articles as $article)
                        <div class="contenido-popular-bar">
                            <li class="list-group-item">
                                <p>{{ App::isLocale('es')?$article->title:$article->en_title}}</p>
                            </li>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @auth
        <hr>
            <div class="edition_title text-center"> 
                <a href="{{ asset('files/'.$editions->edition_route_full_file) }}" type="button" class="btn btn-outline-dark"><i class="fas fa-download"></i>@lang('data.completa')</a>
            </div>
        <hr>
		@endauth

    </div>
    <!------------------------------------------------- ARTICULOS ------------------------------------------------------------>
    <div class="container mt-5">
        <!-- articulo -->
        @foreach($editions->articles as $article)
        <div class="card mb-3">
            <div class="row no-gutters">

                <div class="col-md-4">
                    <a href="{{route('art', $article->slug)}}">
                        <img src="{{ asset('images/'.$article->ruta_image) }}" class="img-fluid">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6><a href="#" class="badge">{{ $article->section }}</a></h6>
                        <h5><b>{{ App::isLocale('es')?$article->title:$article->en_title }}</b></h5>
                        <p>{{ $article->author->name_author }}</p>
                        <p class="card-text"><small class="text-muted">{{ $editions->edition_date }}</small></p>
                        <a type="button" class="btn btn-outline-dark" href="{{route('art', $article->slug)}}">@lang('data.ver_mas')</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <br>
    </div>
</div>
@endsection