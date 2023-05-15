<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class bookController extends Controller
{
    private $books = [
        [
            'author' => 'Jone Austen',
            'title'  => 'Pride and Prejudice'
        ],
        [
            'author' => 'F. Scott Fiitzgerabld',
            'title'  => 'The Great Gatsby'
        ],
        [
            'author' => 'George Orwell',
            'title'  => '1984'
        ],
        [
            'author' => 'J.R.R. Tolkien',
            'title'  => 'The Lord of the Rings'
        ],
        [
            'author' => 'Harper Lee',
            'title'  => 'To Kill a Mockingbird'
        ]
    ];

    function books(){
        return $this -> books;
    }

    function getBook($id){
        $bookId = $id - 1;
        return $this -> books[$bookId];
    }

    function getBookField($id, $field){
        $bookId = $id - 1;
        $book = $this -> books[$bookId];
        return $book[$field];
    }

    function createBook(Request $request){
        $author = $request -> get('author');
        $title  = $request -> get('title');

        return "Author - {$author} and Title - {$title}";  //check to insomnia
    }
}
