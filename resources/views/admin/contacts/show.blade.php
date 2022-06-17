@extends('layouts.applayout')
@section('content')

<div class="w3-row">
  <div class="w3-half w3-container w3-green">
    <h2>{{ $contact->contact_title }}</h2>
    <p>{{ $contact->contact_text }}</p>
  </div>
</div>
		
		

@endsection