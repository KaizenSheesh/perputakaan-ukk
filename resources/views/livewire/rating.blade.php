<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div>
        <div class="flex items-center mt-0">
            <div class="flex items-center ml-2">
                @for ($i = 0; $i < $this->rating; $i++)
                    <svg wire:click="setRating({{ $i + 1 }})" class="w-8 h-8 fill-current text-yellow-600"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                        </path>
                    </svg>
                @endfor

                @for ($i = $this->rating; $i < 5; $i++)
                    <svg wire:click="setRating({{ $i + 1 }})" class="w-8 h-8 fill-current text-gray-400"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                        </path>
                    </svg>
                @endfor
            </div>
        </div>
        <div class="text-2xl flex justify-center mt-2">
            <span class="text-2xl font-extrabold rounded-md px-2">{{ $avgRating }}</span>
        </div>

    </div>
</div>
