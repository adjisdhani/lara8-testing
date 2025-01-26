<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class UserFunctionalTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $payload = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ];

        $response = $this->postJson('/api/users', $payload);

        $response->assertStatus(201)
                 ->assertJsonFragment($payload);

        $this->assertDatabaseHas('users', $payload);
    }

    /** @test */
    public function it_can_get_all_users()
    {
        User::factory()->count(3)->create();

        // Debugging: Periksa jumlah data pengguna sebelum pengujian
        $this->assertEquals(3, User::count());

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
                 ->assertJsonCount(3); // Mengharapkan hanya 3 pengguna
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $payload = [
            'name' => 'Updated Name',
            'email' => 'updatedemail@example.com',
        ];

        $response = $this->putJson("/api/users/{$user->id}", $payload);

        $response->assertStatus(200)
                 ->assertJsonFragment($payload);

        $this->assertDatabaseHas('users', $payload);
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}