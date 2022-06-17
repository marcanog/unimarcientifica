
@extends('layouts.adminlayout')

@section('content')
<div class=".xl-container">
	<br>
	<h4><b>Nuevo Artículo<b></h4>
	<hr>

	<form method="post" action="/admin/article" enctype="multipart/form-data">
		<h5>Información General:</h5>
		<hr>

		<div class="row">
			<div class="col-3" id="title-info">
				<p>Edición:</p>
			</div>
			<div class="col-9">
				<div class="form-group">
					<select class="form-control" id="edition_id" name="edition_id" placeholder="Autor del Artículo">
						@foreach ($editions as $edition)
							<option value="{{$edition->id}}"> {{$edition->edition_number}} </option>
						@endforeach
					</select>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-3" id="title-info">
				<p>Autor:</p>
			</div>
			<div class="col-9">
				<div class="form-group">
					<select class="form-control" id="author" name="author_id" placeholder="Autor del Artículo">
						@foreach ($authors as $author)
							<option value="{{$author->id}}"> {{$author->name_author}} </option>
						@endforeach
					</select>

				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-3" id="title-info">
				<p>Área de conocimiento:</p>
			</div>
			<div class="col-9">
				<div class="form-group">
				<select class="form-control" id="section"  name="section" placeholder="Linea de Investigación">
                    <option value="biologia">Biología Marina</option>
                    <option value="derecho">Derecho</option>
                    <option value="economia">Economía</option>
                    <option value="educación">Educación</option>
                    <option value="epistemologia">Epistemología</option>
                    <option value="filosofia">Filosofía</option>
                    <option value="gerencia">Gerencia</option>
				</select>
				</div>
			</div>
		</div>

		<br>
		<!--Español-->
		<div class="spanish-backgorund">
			<h5><b>Artículo en Español</b></h5>
			<hr>

			<!--Titulo del articulo en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Título:</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="title" name="title" placeholder="Título del Artículo">
				</div>
			</div>

			<!--Imagen del articulo en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Imagen:</p>
				</div>
				<div class="col-9">
					<input accept="image/*" required type="file" name="image" value="image">
				</div>
			</div>

			<!--Abstra del articulo en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Abstracto del Artículo:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_spanish" name="text"></textarea>
				</div>
			</div>

			<!--PDF del articulo en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Archivo PDF del artículo:</p>
				</div>
				<div class="col-9">
					<input accept="file/*" required type="file" name="file" value="file">
				</div>
			</div>
		</div>

		<br>
		<!--English-->
		<div class="english-backgorund">
			<h5><b>Article in English</b></h5>
			<hr>

			<!--Titulo del articulo en ingles-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Title:</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="en_title" name="en_title" placeholder="Title of Article">
				</div>
			</div>



			<!--Astra del articulo en ingles-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Abstract:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_english" required name="en_text"></textarea>
				</div>
			</div>


		</div>

		<br>

	@csrf
	<div>
		<input type="submit" name="enviar" value="Publicar">
	</div>

	</form>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection


