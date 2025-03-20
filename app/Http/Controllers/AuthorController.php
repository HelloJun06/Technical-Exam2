<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    public function addAuthor(Request $request ){
        $incomingFields = $request->validate([
            'name' => ['required', 'max:255'],
            'birth_date' => 'required'
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['birth_date'] = strip_tags($incomingFields['birth_date']);
        
        Author::create($incomingFields);
        return redirect('/');
    }

    public function displayAuthor(Author $authors){
        return view('author', ['author' => $author]);

    }
    public function deleteAuthor(Author $author){
 
        $author->delete();
    
        return redirect('/');
    }
    public function updateAuthor(Author $author, Request $request){
 
        $incomingFields = $request->validate([
            'name' => ['required', 'max:255'],
            'birth_date' => 'required'
        ]);
        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['birth_date'] = strip_tags($incomingFields['birth_date']);

        $author->update($incomingFields);
        return redirect('/author');
    }
    public function displayEditAuthor(Author $author){

        return view('edit-author', ['author' => $author]);
    }

}
