<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BookController
 */
final class BookControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('book.index'));

        $response->assertOk();
        $response->assertViewIs('book.index');
    }
}
