<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class BookController extends Controller
{

    public function index()
    {
        return view('books.index', [
            'books' => Book::latest()->get(),
            'category' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'bookname' => 'required|string|max:255',
            'category_id' => 'required',
            'author' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_book' => 'required|image|mimes:jpeg,png,jpg',
            'year' => 'required|integer|min:0',
            'copies_in_circulation' => 'required|integer|min:0',
        ]);


        // Menyimpan cover buku
        $validatedData['cover_book'] = $request->file('cover_book')->store('cover_book', 'public');

        // Membuat slug dari bookname dengan menambahkan prefiks nama penulis
        $slug = Str::slug($validatedData['author'] . '-' . $validatedData['bookname']);
        // Memastikan slug unik
        $validatedData['book_url'] = $this->makeUniqueSlug($slug);
        // dd($validatedData);
        // Simpan buku ke dalam database
        Book::create($validatedData);

        return redirect()->route('dashboard')
            ->with('status', 'Data buku berhasil ditambahkan!');
    }

    private function makeUniqueSlug($book_url)
    {
        $count = 1;
        $originalSlug = $book_url;
        $slug = $originalSlug; // Inisialisasi variabel $slug

        // Loop sampai menemukan book_url yang unik
        while (Book::where('book_url', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }

    public function details($book_url)
    {
        $book = Book::where('book_url', $book_url)->with('category')->firstOrFail();
        return view('books.details', compact('book'));
    }
}
