@extends('layouts.applayout')
@section('content')
<div class="main">
    <br>
    <div class="container">
        <div class="title-author">
            <h4><b>@lang('data.catalogo')</b></h4>
        </div>
        <hr>
        <div class="list-group">
            @if (count($authors))
                @foreach($authors as $author)
                    <div class="accordion" id="myCollapsible">
                        <div class="card">
                            <div class="card-header" id="heading">
                                <h2 class="mb-0">
                                    <button class="btn btn-block text-left" type="button"  id="#collapse{{ $author->id }}" data-toggle="collapse" href="#collapse{{ $author->id }}" aria-expanded="false" aria-controls="collapse{{ $author->id }}">
                                    <h6><b>{{ $author->name_author }}<i class="fas fa-chevron-down"></i></b></h6>
                                    </button> 
                                </h2>
                            </div>
                            <div id="collapse{{ $author->id }}" class="collapse in" data-parent="#collapse{{ $author->id }}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <div class="row">
                                                <div class="col-md-4 col-sm-12" id="imgcontainer">
                                                    <img id="imgauthor" src="{{ asset('images/'.$author->route_image_author) }}">
                                                </div>
                                                <div class="col-md-8 col-sm-12" id="infoautorcontainer">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><b>{{ $author->name_author}}</b></h5>
                                                        <p class="card-text"><small class="text-muted">{{ $author->email_author}}</small></p>
                                                        <p class="card-text">{{ App::isLocale('es')?$author->grades_author:$author->en_grades_author }}</p>
                                                        <p class="card-text">{!! App::isLocale('es')?$author->resume_author:$author->en_resume_author !!}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <br>
                                            <h6><b>@lang('data.articulos_autor')</b></h6>
                                            <hr>
                                            @foreach($author->articles as $article)
                                            <a id="link-author" href="{{ route('art', $article->slug) }}" style= "color: inherit;">
                                                {{  App::isLocale('es')?$article->title:$article->en_title }}
                                            </a>
                                            @endforeach
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <br>
</div>
@endsection 



