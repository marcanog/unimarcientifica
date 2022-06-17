@extends('layouts.adminlayout')
@section('content')

	

		<p>{{ $about->about_title }}</p>
		<p>{{ $about->about_text}}</p>
		<p>{{ $about->en_about_title }}</p>
		<p>{{ $about->en_about_text }}</p>


	

@endsection