@extends('layouts.applayout')
@section('content')
<div class="main">
<br>
    <div class="container" >
        <div class="title-sections">
            <h4><b>@lang('data.ediciones')</b></h4>
        </div>
        <hr>
        @if (count($editions))
            @foreach($editions as $edition)
                <div class="accordion" id="myCollapsible">
                    <div class="card">
                        <div class="card-header" id="heading">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button"  id="#collapse{{ $edition->id }}" data-toggle="collapse" href="#collapse{{ $edition->id }}" aria-expanded="false" aria-controls="collapse{{ $edition->id }}">
                                <h6><b>{{ App::isLocale('es')?$edition->edition_title:$edition->edition_title_en }}<i class="fas fa-chevron-down"></i></b></h6>
                                </button> 
                            </h2>
                        </div>
                        <div id="collapse{{ $edition->id }}" class="collapse in" data-parent="#collapse{{ $edition->id }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/'.$edition->edition_route_image) }}" class="img-fluid">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5><b>{{ App::isLocale('es')?$edition->edition_title:$edition->edition_title_en }}</b></h5>
                                            <p><b> @lang('data.fechap') </b> {{ $edition->edition_date }}</p>
                                            <p>{!! App::isLocale('es')?$edition->edition_description:$edition->edition_description_en !!}</p>
                                            <a href="fulledicion/{{$edition->id}}" type="button" class="btn btn-outline-dark">@lang('data.full_edition')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <br>
    </div>
</div>
@endsection
