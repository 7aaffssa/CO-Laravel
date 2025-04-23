<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientPhoneTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_one_to_one_relationship()
{
    $client = Client::factory()->create();
    $phone = Phone::factory()->for($client)->create();
    
    $this->assertEquals($client->id, $phone->client->id);
    $this->assertEquals($phone->id, $client->phone->id);
}
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
