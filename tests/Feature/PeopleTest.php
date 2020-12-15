<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PeopleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAllPeople()
    {
        $this->withoutMiddleware();
        $response = $this->get('/api/people');
        $response->assertStatus(200);
    }
}
