@extends('layouts.adminlayout')
@section('content')
<div class="container">
<br>
	<div class="row">
	<div class="col-8">
			<h4>Informacion disponible:</h4>
		</div>
		<div class="col-4">
			<div class="input-group">
				<input type="search" class="form-control rounded" placeholder="Buscar..." aria-label="Search"
					aria-describedby="search-addon" />
				<button type="button" class="btn btn-outline-primary">Buscar</button>
			</div>
		</div>
	</div>
	<hr>

	<table class="table table-striped table-bordered">

		<thead class="thead-dark">
			<tr>
				<th scope="col">Título / Español</th>
				<th scope="col">Title / English</th>
				<th scope="col">Titulo / Italian</th>
				<th scope="col">Modificar</th>
				<th scope="col">Eliminar</th>
			</tr>
		</thead>

		<tbody>
		@foreach($contacts as $contact)
			<tr>
				<th>{{ $contact->contact_title }}</th>
				<th>{{ $contact->en_contact_title }}</th>
				<th>italiano</th>

				<th>
					<a href="{{route('contact.edit', $contact->id)}}">
						<button type="button" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
					</a>
				</th>
				<th>
					<form action="{{route('contact.destroy', $contact->id)}}"  method="POST"">
						{{method_field('DELETE') }}
						@csrf
					<button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
				</form>
			</tr>
		@endforeach
		</tbody>

	</table>
	<div>
		{{$contacts->links()}}
	</div>
	<br>
</div>

@endsection 

