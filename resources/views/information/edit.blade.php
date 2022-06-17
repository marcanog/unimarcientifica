@extends('layouts.adminlayout')

@section('content')

<div class=".xl-container">
	<br>
	<h4><b>Modificar Información:</b></h4>
	<hr>

	<form method="POST" action="{{ route('information.index', [ 'information' => $information->id ])}}" enctype="multipart/form-data">
		<!--Español-->
        <input type="hidden" name="_method" value="PUT">
		<div class="spanish-backgorund">
            <h5><b>Información en Español</b></h5>
			<hr>
			<!--Titulo de la informacion en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Título:</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="information_title" name="information_title" value="{{$information->information_title}}">
				</div>
			</div>

			<!--Texto de la informacion en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Texto:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_information" name="information_text">{!!$information->information_text!!}</textarea>
				</div>
			</div>
            <!--PDF dela informacion en español-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>Archivo PDF:</p>
                </div>
                <div class="col-9">
                    <input accept="file/*" type="file" name="info_file" value="{{$information->info_file}}">
                </div>
            </div>
		</div>
		<br>
		<!--English-->
		<div class="english-backgorund">
            <h5><b>Information in English</b></h5>
			<hr>
			<!--Titulo de la informacion en ingles-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Title:</p>
				</div>
				<div class="col-9">
					<input id="texto" type="text" required id="en_information_title" name="en_information_title"value="{{$information->en_information_title}}">
				</div>
			</div>

			<!--Texto de la informacion en ingles-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Text:</p>
				</div>
				<div class="col-9">
					<textarea id="summernote_information_english" name="en_information_text"> {!! $information->en_information_text !!}</textarea>
				</div>
			</div>

            <!--PDF dela informacion en ingles-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>PDF File:</p>
                </div>
                <div class="col-9">
                    <input accept="file/*" type="file" name="info_en_file" value="{{$information->info_en_file}}">
                </div>
            </div>
		</div>
		<br>

		@csrf
		@method('PUT')
		<div>
			<input type="submit" name="enviar" value="Guardar">
		</div>

	</form>
</div>

@endsection
