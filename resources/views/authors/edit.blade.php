@extends('layouts.adminlayout')

@section('content')
<div class=".xl-container">
	<br>
    <h4><b>Modificación del Autor</b></h4>
	<hr>

	<form method="POST" action="/admin/authors/{{$author->id}}" enctype="multipart/form-data">
		<!--Nombre del autor-->
        <input type="hidden" name="_method" value="PUT">
		<div class="row">
			<div class="col-3" id="title-info">
				<p>Apellido y Nombre:</p>
			</div>
			<div class="col-9">
				<input id="texto" type="text" required id="name_author" name="name_author" value="{{$author->name_author}}">
			</div>
		</div>

		<!--Correo del autor-->
		<div class="row">
			<div class="col-3" id="title-info">
				<p>Correo Electronico:</p>
			</div>
			<div class="col-9">
				<input id="texto" type="text" required id="email_author" name="email_author" value="{{$author->email_author}}">
			</div>
		</div>
		<!--Imagen del autor-->
		<div class="row">
			<div class="col-3" id="title-info">
				<p>Foto del Autor:</p>
			</div>
			<div class="col-9">
				<input accept="image/*" required type="file" name="image_author" value="{{$author->image_author}}">
			</div>
		</div>
		<!--Español-->
		<br>
		<div class="spanish-backgorund">
			<h5><b>Info en Español</b></h5>
			<hr>
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Universidad / Institución:</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="grades_author" name="grades_author" value="{{$author->grades_author}}">
				</div>
			</div>
			<!--Reseña del Autor-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Estudios:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_author_spanish" name="resume_author">{!! $author->resume_author !!}</textarea>
				</div>
			</div>
		</div>
		<!--English-->
		<br>
		<div class="english-backgorund">
			<h5><b>Info on English</b></h5>
			<hr>
			<div class="row">
				<div class="col-3" id="title-info">
					<p>University / Institution</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="en_grades_author" name="en_grades_author" value="{{$author->en_grades_author}}">
				</div>
			</div>
			<!--Reseña del Autor-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Degrees:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_author_english" name="en_resume_author">{!! $author->en_resume_author!!}</textarea>
				</div>
			</div>
		</div>
		@csrf
		<div>
			<input type="submit" name="enviar" value="Guardar">
		</div>

	</form>
</div>



@endsection
