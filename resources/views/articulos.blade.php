@extends('layouts.applayout')

@section('content')

    <div class="main">
        <br>
        <div class="container">
            <div class="title-sections">
                <h4><b>@lang('data.secciones')</b></h4>
            </div>
            <hr>

            <div class="container mt-5">
                <!-- articulo -->
                @foreach($articles as $article)
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
                                <a type="button" class="btn btn-outline-dark" href="{{route('art', $article->slug)}}">@lang('data.ver_mas')</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <br>
            </div>

            <!--div class="personalize-pagination" style="display:flex;justify-content:center;">
                 $articles->links() }}
            </div-->
        </div>
    </div>
@endsection
