@extends('template')

@section('title')
	Lista ksi��ek
@endsection

@section('content')
<div class="container">
  @isset ($book)
	<table class="table">
    <tr>
      <td>Nazwa Ksiazki</td>
  		<td> {{$book->name}} </td>
    </tr>
		<tr>
			<td>Rok wydania</td>
				<td> {{$book->year}} </td>
		</tr>
			<tr>
				<td>Miejsce wydania</td>
					<td> {{$book->publication_place}} </td>
			</tr>
			  <tr>
				<td>Liczba stron</td>
					<td> {{$book->pages}} </td>
			  </tr>
				<tr>
					<td>Cena</td>
						<td> {{$book->price}} </td>
				</tr>
									@isset($book->isbn)	
											<tr>
												<td>Numer ISBN</td>
												<td>{{$book->isbn->number}}</td>
											</tr>
											<tr>
												<td>Numer ISBN wydany przez</td>
												<td>{{$book->isbn->issued_by}}</td>
											</tr>
											<tr>
												<td>Data wydania numeru ISBN</td>
												<td>{{$book->isbn->issued_on}}</td>
											</tr>
									@endisset	

									@isset($book->authors)	
											<tr>
												<td>Autorzy</td>
												<td>
													<ul>
													@foreach ($book->authors as $author)
															<li>
																{{$author->lastname}}  {{$author->firstname}}
															</li>
													@endforeach
													</ul>
												</td>
											</tr>
									@endisset
									
	</table>
	@endisset
</div>
@endsection('content')


