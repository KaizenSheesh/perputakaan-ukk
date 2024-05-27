<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{

    public function index()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Mendapatkan daftar buku yang dibookmark oleh pengguna tersebut
        $bookmarkedBooks = $user->bookmarks()->with('category')->get();

        return view('bookmarks.index', compact('bookmarkedBooks'));
    }
    public function toggleBookmark(Request $request, $bookId)
    {
        // Pastikan pengguna sudah terotentikasi
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You need to login to bookmark this book.');
        }

        // Cek apakah buku sudah ada dalam daftar bookmark pengguna
        $bookmark = Bookmark::where('user_id', $user->id)->where('book_id', $bookId)->first();

        if ($bookmark) {
            // Jika bookmark sudah ada, hapus bookmark
            $bookmark->delete();
            return redirect()->back()->with('success', 'Bookmark removed successfully');
        } else {
            // Jika bookmark belum ada, tambahkan bookmark
            Bookmark::create([
                'user_id' => $user->id,
                'book_id' => $bookId
            ]);
            return redirect()->back()->with('success', 'Bookmark added successfully');
        }
    }
}
