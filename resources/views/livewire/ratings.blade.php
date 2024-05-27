<div>
    <div class="flex items-center justify-start">
        <div class="flex items-center">
            @for ($i = 0; $i < $this->rating; $i++)
                <svg class="w-3 h-3 fill-current text-yellow-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                    </path>
                </svg>
            @endfor

            @for ($i = $this->rating; $i < 5; $i++)
                <svg class="w-3 h-3 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                    </path>
                </svg>
            @endfor
            <span class="text-lgfont-extrabold rounded-md px-2">{{ $avgRating }}</span>
        </div>
    </div>
</div>
