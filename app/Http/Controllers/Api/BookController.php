<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function get()
    {
        $book = Book::all();
        if ($book->count() > 0) {
            $data = [
                'success' => 200,
                'book' => $book
            ];
            return response()->json($data, 200);
        }
        return response()->json([
            'status' => 404,
            'book' => 'No Record Found'
        ], 404);
    }

    public function getByPage($number)
    {
        $number = intval($number);
        $book = Book::where('number', $number)->get();

        $data = [
            'success' => 200,
            'content' => $book[0]->content
        ];
        return response()->json($data, 200);
    }

    public function create(Request $request)
    {
        $number = intval($request->input('number'));
        $book = new Book;
        $book->number = $number;
        $book->view_number = $number . '';
        $book->content = '';
        $book->save();
        return response()->json(['success' => 200, 'page' => $number], 200);
    }

    public function update(Request $request)
    {
        $number = intval($request->input('number'));
        $content = $request->input('content');

        $book = new Book;
        $book::where('number', $number)->update(['content' => $content]);
        return response()->json(['success' => 200, 'page' => $number], 200);
    }

    public function delete($number)
    {
        $number = intval($number);
        $book = new Book;
        $book::where('number', $number)->delete();

        return response()->json(['success' => 200, 'page' => $number], 200);
    }
}
