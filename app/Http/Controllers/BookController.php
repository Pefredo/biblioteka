<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;
use DB;
use App\Models\Author;
use App\Models\Book;
use App\Models\Isbn;


use Illuminate\Http\Request;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookRepository $bookRepo)
    {
		$booksList = $bookRepo->getAll();
		return view('books/list', ['booksList' => $booksList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(BookRepository $bookRepo)
    {
		$authors = Author::all();
		return view('books/create',['authors' => $authors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,BookRepository $bookRepo )
    {

			$data = $request->all();
			$bookLists = $bookRepo->create($data);

		return redirect('books');	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookRepository $bookRepo, $id)
    {
		$book = $bookRepo->find($id);
		return view('books/show', ['book' => $book]);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRepository $bookRepo, $id)
    {
		$data = [
				name => "Quo Vadis",
				year => "2001",
				publication_place => "Warszawa",
				pages => "650",
				price => "59.90",		
				];
		$booksList = $bookRepo->update($data, $id);
		
		return redirect('books');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRepository $bookRepo, $id)
    {
        $booksList = $bookRepo->delete($id);
	
		return redirect('books');
    }
	
	public function cheapest(BookRepository $bookRepo)
	{
		$booksList = $bookRepo->cheapest();
		return view('books/list',['booksList'=> $booksList]);
	}
	
	public function longest(BookRepository $bookRepo)
	{
		$booksList = $bookRepo->longest();
		return view('books/list',['booksList'=> $booksList]);
	}
	
	public function search(Request $request, BookRepository $bookRepo)
	{
		$q = $request->input('q', "");
		$booksList = $bookRepo->search($q);
		return view('books/list',['booksList'=> $booksList]);
	}

}
