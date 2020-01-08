@extends('template')

@section('title')
	Lista książek
@endsection

@section('content')
	<div class="container">
		@forelse ($booksList as $book)
		@empty
			Brak rekordów!
		@endforelse
	</div>
@endsection('content')