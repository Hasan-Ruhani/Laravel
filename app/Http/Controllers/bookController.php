<?php

namespace App\Http\Controllers;

use Faker\Extension\FileExtension;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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

    function getIp(Request $request){
        $myIp = $request -> ip();
        return $myIp;
    }

    function getCookie(Request $request): array|string|int|bool|null{  //use any method
        return $request -> cookie();    //all cookie
        //  return $request -> cookie('laravel_session');   //single cookie
    }

    function getFile(Request $request): array{
        $author = $request -> get('author');
        $title  = $request -> get('title');
        $file   = $request->file('photo');
        $fileSize = filesize($file);
        $fileType = filetype($file);
        $originalName = $file -> getClientOriginalName();
        $tempFileName = $file -> getFilename();
        $extension = $file -> extension();

        $file -> move(public_path('upload'), $file ->  getClientOriginalName());
        // $file -> storeAs('upload', $file -> getClientOriginalName());
        return array(
            'Author' => $author,
            'Title' => $title,
            'FileSize' => $fileSize,
            'FileType' => $fileType,
            'OriginalName' => $originalName,
            'TempFileName' => $tempFileName,
            'Extension' => $extension
            );
            

        //  return "Author - {$author} Title - {$title} and Photo - {$file}";
    }

    function getRespons(Request $request): JsonResponse{
        $code = 202;
        $content = array('Name' => 'Hasan', 'City' => 'Khulna');
        return response() -> json($content, $code);
    }

    //............................................Re Direct System
    function reDirect1(): string{
        return redirect("/redirect2");
    }

    function reDirect2(): string{
        return "Redirected Page From redirect1";
    }
    //............................................Re Direct System

    function fileBainary(){
        $filePath = "upload/kk.jpeg";
        return response() -> file($filePath);
    }

    function fileDownload(){
        $filePath = "upload/kk.jpeg";
        return response() -> download($filePath);
    }

    function greet(){
        return "Secreat Massage";
    }

    function clickBreak(){
        return "Hi please only 5 click in a minite";
    }
}
