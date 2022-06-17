@extends('layouts.adminlayout')
@section('content')

<div class="row justify-content-center">
<h2><b>Sobre Nosotros / About Us</b></h2>
</div>
<div class="container">
<table class="w3-table-all w3-striped w3-bordered w3-centered w3-hoverable">
	<tr class="w3-teal">
	  
	  <th scope="col">Título / Español</th>
	  <th scope="col">Title / English</th>
	  <th scope="col">Operaciones</th>
	  <th scope="col"></th>
	</tr>
	@foreach($abouts as $about)
	<tr>

		<td><p>{{ $about->about_title }}</p></td>
		<td><p>{{ $about->en_about_title }}</p></td>
		<td style="display:flex;justify-content:center;">
			<a href="{{route('about.edit', $about->id)}}" class="w3-btn"><i class="fas fa-edit"></i></a>
		</td>
		<td>
			<form action="{{route('about.destroy', $about->id)}}" method="post">
				@csrf
				@method('delete')
				<button type="submit" class="w3-btn"><i class="fas fa-trash"></i></button>
			</form>
		</td>
	</tr>
	@endforeach
</table>
</div>
<div class="d-flex justify-content-center mt-2">
{{$abouts->links()}}
</div>
		


@endsection