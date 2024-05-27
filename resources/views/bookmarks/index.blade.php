<x-app-layout>
    <div class="w-full flex justify-center mt-5">
        <h2 class="text-2xl">Bookmark Saya</h2>
    </div>
    <div class="mx-auto sm:px-6 lg:p-8">

        @if ($bookmarkedBooks->isEmpty())
            <p class="text-center">Tidak ada Bookmark yang tersedia.</p>
        @else
            <div class="grid grid-col-1 place-items-center lg:grid-cols-3 p-8 gap-5 lg:gap-40">
                @foreach ($bookmarkedBooks as $book)
                    <div class="card card-compact w-80 bg-base-100 shadow-xl mb-20">
                        <figure>
                            <img class="w-full h-96 object-cover" src="{{ asset('storage/' . $book->cover_book) }}"
                                alt="{{ $book->bookname }}" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title mb-0">{{ $book->bookname }}</h2>
                            <livewire:ratings :book="$book" :key="$book->id" />
                            <p>
                                {{ Str::limit($book->description, 110) }}
                            </p>
                            <div class="card-actions justify-end">
                                <a href="{{ route('books.details', ['book_url' => $book->book_url]) }}"
                                    class="btn btn-primary">See More!</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
