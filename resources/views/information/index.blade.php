@extends('layouts.adminlayout')
@section('content')
<div class="container">
<br>
	<div class="row">
	<div class="col-8">
			<h4><b>Informacion disponible:</b></h4>
		</div>
		<!--div class="col-4">
			<div class="input-group">
				<input type="search" class="form-control rounded" placeholder="Buscar..." aria-label="Search"
					aria-describedby="search-addon" />
				<button type="button" class="btn btn-outline-primary">Buscar</button>
			</div>
		</div-->
	</div>
	<hr>

	<table class="table table-striped table-bordered">

		<thead class="thead-dark">
			<tr>
				<th scope="col">Título / Español</th>
				<th scope="col">Title / English</th>
				<th scope="col">Modificar</th>
				<th scope="col">Eliminar</th>
			</tr>
		</thead>

		<tbody>
		@foreach($information as $information)
		<tr>
			<td><p>{{ $information->information_title }}</p></td>
			<td><p>{{ $information->en_information_title }}</p></td>
				<th>
				<a href=" {{route('information.edit', $information->id)}} " class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
				</th>
				<th>
					<form action="{{route('information.destroy', $information->id)}}"  method="POST"">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
					</form>
				</th>
		</tr>
		@endforeach
		</tbody>

	</table>

	<br>
</div>

@endsection
