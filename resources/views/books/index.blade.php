<x-app-layout>
    <div class="py-12">
        <div class="mx-auto py-2 sm:rounded-lg bg-white dark:bg-gray-800 shadow-sm">
            <div class="mx-auto sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                <h2 class="m-6 text-xl font-semibold text-gray-900 dark:text-gray-100 text-center">Perpustakaan Digital
                </h2>
                @can('Petugas')
                    <button class="btn my-5" onclick="my_modal_4.showModal()">Tambah Buku!</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box w-11/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Tambah Data Buku</h3>
                            <div class="flex flex-col gap-2 mt-2">
                                <form action="{{ route('addBooks') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <x-input-label for="bookname" :value="__('Judul Buku')" />
                                        <x-text-input id="bookname" class="block mt-1 w-full" type="text"
                                            name="bookname" :value="old('bookname')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('bookname')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="categories_id" :value="__('Kategori Buku')" />
                                        <select name="category_id" id="categories_id"
                                            class="select select-primary w-full max-w-xs">
                                            <option disabled selected>Silahkan Pilih Kategori Buku</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="author" :value="__('Author')" />
                                        <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                            :value="old('author')" required autofocus autocomplete="author" />
                                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="year" :value="__('Year')" />
                                        <input type="number" id="year"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="text" name="year" :value="old('year')" required autofocus
                                            autocomplete="year" />
                                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="description" :value="__('Description')" />
                                        <input type="type" id="description"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="text" name="description" :value="old('description')" required autofocus
                                            autocomplete="description" />
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="cover_book" :value="__('Cover Book')" />
                                        <input type="file" id="cover_book"
                                            class="file-input file-input-bordered file-input-md w-full max-w-full"
                                            name="cover_book" :value="old('cover_book')" required autofocus
                                            autocomplete="cover_book" />
                                        <x-input-error :messages="$errors->get('cover_book')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="copies_in_circulation" :value="__('Copies')" />
                                        <input id="copies_in_circulation"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="number" name="copies_in_circulation"
                                            :value="old('copies_in_circulation')" required autofocus
                                            autocomplete="copies_in_circulation" />
                                        <x-input-error :messages="$errors->get('copies_in_circulation')" class="mt-2" />
                                    </div>
                            </div>
                            <div class="modal-action">
                                <!-- if there is a button, it will close the modal -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                @endcan
                @can('Administrator')
                    <button class="btn my-5" onclick="my_modal_4.showModal()">Tambah Buku!</button>
                    <dialog id="my_modal_4" class="modal">
                        <div class="modal-box w-11/12 max-w-5xl">
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="font-bold text-lg">Tambah Data Buku</h3>
                            <div class="flex flex-col gap-2 mt-2">
                                <form action="{{ route('addBooks') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2">
                                        <x-input-label for="bookname" :value="__('Book Name')" />
                                        <x-text-input id="bookname" class="block mt-1 w-full" type="text"
                                            name="bookname" :value="old('bookname')" required autofocus autocomplete="name" />
                                        <x-input-error :messages="$errors->get('bookname')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="categories_id" :value="__('Kategori Buku')" />
                                        <select name="category_id" id="categories_id"
                                            class="select select-primary w-full max-w-xs">
                                            <option disabled selected>Silahkan Pilih Kategori Buku</option>
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="author" :value="__('Author')" />
                                        <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                            :value="old('author')" required autofocus autocomplete="author" />
                                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="year" :value="__('Year')" />
                                        <input type="number" id="year"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="text" name="year" :value="old('year')" required autofocus
                                            autocomplete="year" />
                                        <x-input-error :messages="$errors->get('year')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="description" :value="__('Description')" />
                                        <input type="type" id="description"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="text" name="description" :value="old('description')" required autofocus
                                            autocomplete="description" />
                                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="cover_book" :value="__('Cover Book')" />
                                        <input type="file" id="cover_book"
                                            class="file-input file-input-bordered file-input-md w-full max-w-full"
                                            name="cover_book" :value="old('cover_book')" required autofocus
                                            autocomplete="cover_book" />
                                        <x-input-error :messages="$errors->get('cover_book')" class="mt-2" />
                                    </div>
                                    <div class="mt-2">
                                        <x-input-label for="copies_in_circulation" :value="__('Copies')" />
                                        <input id="copies_in_circulation"
                                            class="block mt-1 w-full h-10 p-2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"
                                            type="text" name="copies_in_circulation"
                                            :value="old('copies_in_circulation')" required autofocus
                                            autocomplete="copies_in_circulation" />
                                        <x-input-error :messages="$errors->get('copies_in_circulation')" class="mt-2" />
                                    </div>
                            </div>
                            <div class="modal-action">
                                <!-- if there is a button, it will close the modal -->
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </dialog>
                @endcan
                @if (session()->has('status'))
                    <div class="w-full flex justify-center mb-5">
                        <div class="w-2/4">
                            <div role="alert" class="alert alert-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session()->get('status') }}</span>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="grid grid-col-1 place-items-center lg:grid-cols-3 gap-5 lg:gap-40">
                    @foreach ($books as $book)
                        <div class="card card-compact w-80 bg-base-100 shadow-xl">
                            <figure>
                                <img class="w-full h-96 object-contain"
                                    src="{{ asset('storage/' . $book->cover_book) }}" alt="{{ $book->bookname }}" />
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
            </div>
        </div>
    </div>
</x-app-layout>
