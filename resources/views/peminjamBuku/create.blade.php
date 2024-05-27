<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Anda ingin Meminjam Buku') }} "{{ $book->bookname }}"
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white dark:bg-gray-800">
                <div class="p-6">
                    <form method="POST" action="{{ route('peminjamBuku.store', ['book' => $book->id]) }}">
                        @csrf
                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                            <label class="block">
                                <span>Berapa banyak buku yang ingin anda pinjam?</span>
                                <input type="number" name="number_borrowed"
                                    class="h-10 p-2 block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                    placeholder="Berapa banyak buku yang ingin anda pinjam?"
                                    value="{{ old('number_borrowed') }}" />
                            </label>
                            @error('number_borrowed')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                            <label class="block">
                                <span>Tanggal Pengembalian</span>
                                <input type="date" name="return_date" min="{{ now()->format('Y-m-d') }}"
                                    class="h-10 p-2 block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                    placeholder="" value="{{ old('return_date') }}" />
                            </label>
                            @error('return_date')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>
                        <x-primary-button type="submit">
                            Submit
                        </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
