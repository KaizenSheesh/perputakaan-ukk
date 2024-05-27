<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CreatePetugasController
 */
final class CreatePetugasControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('create-petuga.index'));

        $response->assertOk();
        $response->assertViewIs('petugas.create');
    }
}
