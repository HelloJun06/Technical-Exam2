<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function addBook(Request $request){
        $incomingFields = $request->validate([
            'title' => ['required', 'max:255'],
            'author_id' => 'required',
            'published_date' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author_id'] = strip_tags($incomingFields['author_id']);
        $incomingFields['published_date'] = strip_tags($incomingFields['published_date']);
        
        Book::create($incomingFields);
        return redirect('book');
    }
    public function displayBook(Book $books){
        return view('book', ['book' => $book]);

    }
    public function deleteBook(Book $book){
 
        $book->delete();
    
        return redirect('book');
    }

    public function displayEditBook(Book $book){

        $authors = Author::all();
        return view('edit-book', compact('book', 'authors'));
    }

    public function updateBook(Book $book, Request $request){
 
        $incomingFields = $request->validate([
            'title' => ['required', 'max:255'],
            'author_id' => 'required',
            'published_date' => 'required'
        ]);
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['author_id'] = strip_tags($incomingFields['author_id']);
        $incomingFields['published_date'] = strip_tags($incomingFields['published_date']);

        $book->update($incomingFields);
        return redirect('book');
    }
}
