<?php

namespace Tests\Feature\Http\Controllers;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LoanController
 */
final class LoanControllerTest extends TestCase
{
    #[Test]
    public function index_displays_view(): void
    {
        $response = $this->get(route('loan.index'));

        $response->assertOk();
        $response->assertViewIs('loan.index');
    }
}
