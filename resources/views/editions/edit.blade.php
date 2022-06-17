@extends('layouts.adminlayout')

@section('content')
<div class=".xl-container">
	<br>
    <h4><b>Modificación de la edición:</b></h4>
	<hr>
    <br>

    <form method="POST" action="{{ url('admin.editions.[$editions->id].edit')}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        <!--General-->
        <div class="row">
            <div class="col-3" id="title-info">
                <p>Número de la Edicion:</p>
            </div>
            <div class="col-9">
                <input id="texto" type="text" required id="edition_number" name="edition_number" value="{{$editions->edition_number}}">
            </div>
        </div>

        <div class="row">
            <div class="col-3" id="title-info">
                <p>Fecha de la Edicion:</p>
            </div>
            <div class="col-9">
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control" required id="edition_date" name="edition_date" value="{{$editions->edition_date}}">
                    <span class="input-group-append">
                        <span class="input-group-text bg-white">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>

        <!--Español-->
        <br>
        <div class="spanish-backgorund">
            <h5><b>Información de la edición en Español</b></h5>
            <hr>

            <!--Titulo de la edicion en español-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>Titulo de la Edición:</p>
                </div>
                <div class="col-9">
                    <input id="texto" type="text" required id="edition_title" name="edition_title" value="{{$editions->edition_title}}">
                </div>
            </div>

            <!--Descripcion de la edicion en español-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>Descripción de la Edicion:</p>
                </div>
                <div class="col-9">
                    <textarea id="summernote_edition_description" name="edition_description">{!! $editions->edition_description !!}</textarea>
                </div>
            </div>

            <!--Caratula de la edicion en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Caratula de la Edición:</p>
				</div>
				<div class="col-9">
					<input accept="image/*" required type="file" name="edition_image" value="edition_image">
				</div>
			</div>

            <!--PDF de la edicion en español-->
			<div class="row">
				<div class="col-3" id="title-info">
					<p>Archivo PDF de la edición completa:</p>
				</div>
				<div class="col-9">
					<input accept="file/*" required type="file" name="edition_full_file" value="edition_full_file">
				</div>
			</div>
        </div>

        <!--English-->
        <br>
        <div class="english-backgorund">
            <h5><b>Information of the edition on English</b></h5>
            <hr>

            <!--Titulo de la edicion en ingles-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>Title of the Edition:</p>
                </div>
                <div class="col-9">
                    <input id="texto" type="text" required id="edition_title_en" name="edition_title_en" value="{{$editions->edition_title_en}}">
                </div>
            </div>

            <!--Descripcion de la edicion en ingles-->
            <div class="row">
                <div class="col-3" id="title-info">
                    <p>Description of the Edition:</p>
                </div>
                <div class="col-9">
                    <textarea id="summernote_edition_description_en" name="edition_description_en">{!! $editions->edition_description_en !!}</textarea>
                </div>
            </div>

        </div>
        <br>

        @csrf  

		<div>
			<input type="submit" name="enviar" value="Guardar">
		</div>

	</form>
</div>

@endsection
