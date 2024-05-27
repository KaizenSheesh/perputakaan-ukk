<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PeminjamanController
 */
final class PeminjamanControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('peminjaman.index'));

        $response->assertOk();
        $response->assertViewIs('peminjaman.index');
    }
}
