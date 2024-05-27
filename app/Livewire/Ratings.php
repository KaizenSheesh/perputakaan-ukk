<?php

namespace App\Livewire;

use Livewire\Component;

class Ratings extends Component
{
    public function render()
    {
        return view('livewire.ratings');
    }
    public $rating;
    public $avgRating;
    public $book;

    public function mount($book) {
        $this->book = $book;

        // Cek apakah ada pengguna yang masuk
        if (auth()->check()) {
            $userRating = $this->book->users()
                ->where('user_id', auth()->user()->id)->first();

            if ($userRating) {
                $this->rating = $userRating->pivot->rating;
            }
        } else {
            // Jika tidak ada pengguna yang masuk, atur rating ke nilai default
            $this->rating = 0;
        }

        $this->calculateAverageRating();
    }

    private function calculateAverageRating() {
        $this->avgRating = round($this->book->users()->avg('rating'), 1);
    }

    public function setRating($val)
    {
        if ($this->rating == $val) {    // user can click on the same rating to reset the value
            $this->rating = 0;
        } else {
            $this->rating = $val;
        }

        $userId = auth()->user()->id;
        $userRating = $this->book->users()->where('user_id', $userId)->first();

        if (!$userRating) {
            $userRating = $this->book->users()->attach($userId, [
                'rating' => $val
            ]);
        } else {
            $this->book->users()->updateExistingPivot($userId, [
                'rating' => $val
            ], false);
        }

        $this->calculateAverageRating();
    }
}
