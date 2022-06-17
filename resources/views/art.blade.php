
@extends('layouts.applayout')
	@section('co-title')- {{ App::isLocale('es')?$article->title:$article->en_title }}@endsection
@section('content')

<div class=".container-xl">
	<div class="article">

		<div class="row">

			<div class="col-sm-9">
				<br>
				<div class="container">
					<div class="title-article">
						<h2><b>{{ App::isLocale('es')?$article->title:$article->en_title }}</b></h2>
						<br>
					</div>
				</div>

				<div class="img-article">
					<img src="{{ asset('images/'.$article->ruta_image) }}">
				</div>

				<br>

				<div class="resume-article">
					<div class="container">
						<p><b><i>@lang('data.resumen')</i></b></p>
						<div>{!! App::isLocale('es')?$article->text:$article->en_text !!}</div>
					</div>
				</div>
                <div class="button-article">
                <a href="
                {{ asset('files/'.$article->ruta_file) }}" type="button" class="btn btn-success"><i class="fas fa-download"></i> @lang('data.descarga')</a>
                </div>
				<br>
			</div>

			<div class="col-sm-3" id="content_bar_right">
				<div class="content">
                    <br>
                    <h6><b>@lang('data.info_authors')</b></h6>
                    <hr>
                    <img src="{{ asset('images/'. $article->author->route_image_author) }}" class="img-fluid">
                    <br>
                    <div class="info-container">
                        <ul class="author-article" >
                            <p><b>{{ $article->author->name_author }}</b></p>

                            <p>{{ App::isLocale('es')?$article->author->grades_author:$article->author->en_grades_author }}</p>
                            <p><b>@lang('data.email') </b>{{ $article->author->email_author }}</p>
                        </ul>
                        <ul class="bio-author" >
                            <p>{!! App::isLocale('es')?$article->author->resume_author:$article->author->en_resume_author !!}</p>
                        </ul>
                        <br>
                        <ul class="card-body" >
							<h6><a class="badge">{{ $article->section }}</a></h6>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class=".container-xl">
	<div class="article-comments">
		<div class="background-comment">

			<div class="row">
				<div class="col-2"></div>

				<div class="col-8">
					<div class="comment-header">
						@if (Auth::check())
							<div class="comment-area">
								<p><b>@lang('data.escribe_comentario')</b></p>
								<div class="gradiente">
									<p><b>///////////////////</b></p>
								</div>
								<form action="/comment/{{ $article->id }}" method="POST">
									@csrf
									<textarea type="text" class="form-control" name="comment" placeholder="@lang('data.escribe_comentario')" style="height:70px; width:99%;"></textarea>
									<input class="btn btn-primary" type="submit" value="@lang('data.enviar')">
								</form>
							</div>
						@else
							<div class="title-comment-section">
								<p><b>@lang('data.seccion_comentarios')</b></p>
								<div class="gradiente">
									<p><b>/////////////</b></p>
								</div>
								<div class="inivtacion">
									<p>@lang('data.aviso')</p>
								</div>
							</div>
						@endif
					</div>

					<div class="posted-comment-area">
						@foreach($article->comment as $comment)
							<hr>
								<div class="user-name-comment">
									<img src="{{asset('images/uni.png')}}>
									<p><b>{{ $comment->user->name }}</b></p>
								</div>
								<div class="user-comment">
									<p>{{ $comment->comment }}</p>
								</div>
							@endforeach
						<hr>
					</div>

				</div>

				<div class="col-2"></div>
			</div>

		</div>
	</div>
</div>

@endsection


