@extends('template')

@section('title')
	Lista książek
@endsection

@section('content')
	<div class="container">
	
		<table class="table">
		
			<tr>
				<td>Nazwa książki</td>
				<td>Data wypożyczenia</td>
				<td>Data planowanego zwrotu</td>
				<td>Data zwrotu</td>
				<td>Dane klienta</td>
			</tr>
				@forelse ($loansList as $loan)
					<tr>
						<td>{{$loan->book->name}} </td>
						<td>{{$loan->loaned_on}} </td>
						<td>{{$loan->estimated_on}} </td>
						<td>{{$loan->returned_on}} </td>
						<td>{{$loan->client}} </td>
					</tr>
				@empty
					Brak rekordów!
				@endforelse
		</table>
	</div>
@endsection('content')