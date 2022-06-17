@extends('layouts.adminlayout')
@section('content')

<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

h3{
	background-color: #008080;
	color: white;
	text-align: center;
	padding: 12px 20px;
}

@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<div class="container">
  <form method="post" action="/admin/contact/{{$contact->id}}">
  	<h3>Editar: Formulario de Contacto en Español</h3>
    <input type="hidden" name="_method" value="PUT">

  		<div class="row">
    		<div class="col-25" align="center">
      		<label>Título:</label>
    		</div>
		    <div class="col-75">
		      <input type="text" required id="contact_title" name="contact_title" value="{{$contact->contact_title}}">
		    </div>
  		</div>

  		<div class="row">
    		<div class="col-25" align="center">
      		<label>Texto:</label>
    		</div>
    		<div class="col-75">
      		<textarea id="text" required name="contact_text" style="height:200px">{{$contact->contact_text}}</textarea>
    		</div>
  		</div>
  		
<br>
  		<h3>About Us on English</h3>
      <div class="row">
        <div class="col-25" align="center">
          <label>Title:</label>
        </div>
        <div class="col-75">
          <input type="text" required id="en_contact_title" name="en_contact_title" value="{{$contact->en_contact_title}}">
        </div>
      </div>

      <div class="row">
        <div class="col-25" align="center">
          <label>Text:</label>
        </div>
        <div class="col-75">
          <textarea id="text" required name="en_contact_text" style="height:200px">{{$contact->en_contact_text}}</textarea>
        </div>
      </div>


      @csrf
      <br>
  		<div class="row justify-content-center">
        <input type="submit" name="enviar" value="Editar">
      </div>

    </form>

</div>

@endsection