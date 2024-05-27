<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DetailBookController
 */
final class DetailBookControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('detail-book.index'));

        $response->assertOk();
        $response->assertViewIs('book.detail');
    }
}
