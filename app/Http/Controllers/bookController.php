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

    function books(Request $request){
        $limit = $request -> query('limit', 0);
        if($limit == 0){
            return $this -> books;
        }
        else{
            return array_splice($this->books, 0, $limit);
        }
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

    function getHeader(Request $request){
        $author = $request -> get('author');
        $title  = $request -> get('title');
        $token  = $request->header('token');

        return "Author - {$author} Title - {$title} and Token - {$token}";
    }
}
