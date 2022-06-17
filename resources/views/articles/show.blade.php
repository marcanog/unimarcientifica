@extends('layouts.applayout')

@section('content')
<br><br><br>

	<div class="w3-row">
  <div class="w3-half w3-container">

  	<img src="images::url{{ $article->ruta_image }}" style="width:100%; height: 400px">
    
  </div>
  <div class="w3-half w3-container">
  	
    <div class="w3-container w3-serif w3-center">
		<strong><h2>{{ $article->title }}</h2></strong>
	</div>

	<div class="w3-container w3-margin-bottom w3-margin-left">
		<div class="w3-left-align"><i>
			<p>{{ $article->author }}</p>
			<p>{{ $article->section }}</p>
			<p>{{ $article->created_at }}</p>
			</i><br>
		</div>
		<div class="w3-container w3-center">
			<a href="files/{{ $article->ruta_file }}" class="w3-button w3-black"><i class="fas fa-download"></i> Artículo Completo</a>	
		</div>
	</div>
	 </div>
    </div>
		<div class="w3-container w3-hide-small w3-black w3-serif w3-margin">
			<h4><b><i>Resumen:</i></b></h4>
  			<p>{{ $article->text }}</p>
		
		</div>

	<div class="w3-container w3-hide-small w3-serif w3-margin">
		<label class="w3-text-grey">Comentarios</label>
		<textarea class="w3-input w3-border" style="resize:none"></textarea>
	</div>
		
		
 

		
		

	

@endsection
