<x-app-layout>

    @can('User')
        @if ($book->canBeBorrowed())
            <a href="{{ route('peminjamBuku.create', ['book' => $book->id]) }}">
                <div
                    class="fixed w-16 h-16 shadow-black shadow-2xl rounded-full flex justify-center items-center bottom-4 right-4">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 19V4c0-.6.4-1 1-1h12c.6 0 1 .4 1 1v13H7a2 2 0 0 0-2 2Zm0 0c0 1.1.9 2 2 2h12M9 3v14m7 0v4" />
                    </svg>
                </div>
            </a>
        @else
            <div class=""></div>
        @endif
    @endcan
    <div class="flex flex-row gap-5">
        <div class="flex bg-white flex-col w-1/4 justify-center items-center container mx-auto mt-5 ml-16">
            <img class="rounded-lg rounded-b-none object-contain w-full h-96 shadow-2xl"
                src="{{ asset('storage/' . $book->cover_book) }}" alt="Cover">
            <form class="w-full" action="{{ route('toggle.bookmark', $book->id) }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full h-10 flex justify-center items-center text-white rounded-lg rounded-t-none bg-[#4A00FF]">
                    Bookmark
                </button>
            </form>
        </div>
        <div class="flex bg-white w-3/4 flex-col p-5 shadow-2xl rounded-md mt-5 mr-16">
            <h1 class="font-bold text-2xl">{{ $book->bookname }}</h1>
            <div class="flex py-2 px-0">
                <div class="flex w-2/4 flex-col">
                    <p>Penulis : {{ $book->author }}</p>
                    <p>Kategori : {{ $book->category->name }}</p>
                    <p>Tahun Rilis : {{ $book->year }}</p>
                    <p> Jumlah Buku :
                        @if ($book->copies_in_circulation < 10)
                            <span class="inline-flex">
                                {{ $book->copies_in_circulation }}
                            </span>
                        @elseif($book->copies_in_circulation < 20)
                            <span class="inline-flex">
                                {{ $book->copies_in_circulation }}
                            </span>
                        @else
                            <span class="inline-flex">
                                {{ $book->copies_in_circulation }}
                            </span>
                        @endif
                    </p>
                </div>
                <div class="flex w-2/4 flex-col">
                    <p>Penerbit : Perpustakaan Cihuyyy</p>
                    <p>Tahun Penerbit : {{ $book->created_at->format('d/m/Y') }}</p>
                    <p>
                        Buku yang tersedia :
                        @if ($book->availableCopies() < 10)
                            <span class="inline-flex">
                                {{ $book->availableCopies() }}
                            </span>
                        @elseif($book->availableCopies() < 20)
                            <span class="inline-flex">
                                {{ $book->availableCopies() }}
                            </span>
                        @else
                            <span class="inline-flex">
                                {{ $book->availableCopies() }}
                            </span>
                        @endif
                    </p>
                </div>
            </div>
            <h1 class="font-bold text-lg">Deskripsi Buku</h1>
            <p>{{ $book->description }}</p>
        </div>
    </div>
    <div class="flex flex-col w-full justify-center items-center mt-20">
        <h1 class="text-3xl mb-2">Rating Buku ini!</h1>
        <livewire:rating :book="$book" :key="$book->id" />
    </div>
    <livewire:comments :model="$book" />
</x-app-layout>
