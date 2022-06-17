@extends('layouts.adminlayout')

@section('content')
<div class="container">
<br>
	<div class="row">

		<div class="col-8">
			<h4><b>Lista de Autores:</b></h4>
		</div>
		<!--div class="col-4">
			<div class="input-group">
				<input type="search" class="form-control rounded" placeholder="Buscar..." aria-label="Search"
					aria-describedby="search-addon" />
				<button type="button" class="btn btn-outline-primary">Buscar</button>
			</div>
		</div -->
	</div>
	<hr>

	<table class="table table-striped table-bordered">
		<thead class="thead-dark">
		<tr>
			<th scope="col">Apellido y Nombre</th>
			<th scope="col">Modificar</th>
			<th scope="col">Eliminar</th>
		</tr>
		</thead>

		<tbody>
		@foreach($authors as $author)
		<tr>
			<td><p>{{ $author->name_author }}</p></td>
			<td>
				<a href=" {{route('authors.edit', $author->id)}} " class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
			</td>
			<td>
				<form action="{{route('authors.destroy', $author->id)}}" method="post">
					@csrf
					@method('delete')
					<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
				</form>
			</td>
		</tr>
		@endforeach
		</tbody>
	</table>
<br>
</div>

@endsection
