<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EmailSMTPTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware;

    /**
     * A basic unit test example.
     */
    public function test_smtp()
    {
        // Arrange
        // Create any required resources

        // Act
        $response = $this->call('GET', '/send-test-email');

        // Assert
        $response->assertStatus(200);
    }
}
