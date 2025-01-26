<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserIntegrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user_in_database()
    {
        // Act: Tambahkan user ke database
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);

        // Assert: Pastikan user berhasil ditambahkan
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    /** @test */
    public function it_can_read_a_user_from_database()
    {
        // Arrange: Buat user terlebih dahulu
        $user = User::factory()->create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
        ]);

        // Act: Ambil user dari database
        $retrievedUser = User::where('email', 'janedoe@example.com')->first();

        // Assert: Pastikan data user sesuai
        $this->assertEquals('Jane Doe', $retrievedUser->name);
        $this->assertEquals('janedoe@example.com', $retrievedUser->email);
    }

    /** @test */
    public function it_can_update_a_user_in_database()
    {
        // Arrange: Buat user terlebih dahulu
        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'oldemail@example.com',
        ]);

        // Act: Perbarui data user
        $user->update([
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);

        // Assert: Pastikan data user telah diperbarui
        $this->assertDatabaseHas('users', [
            'name' => 'New Name',
            'email' => 'newemail@example.com',
        ]);
    }

    /** @test */
    public function it_can_delete_a_user_from_database()
    {
        // Arrange: Buat user terlebih dahulu
        $user = User::factory()->create([
            'name' => 'To Be Deleted',
            'email' => 'delete@example.com',
        ]);

        // Act: Hapus user dari database
        $user->delete();

        // Assert: Pastikan user telah dihapus
        $this->assertDatabaseMissing('users', [
            'name' => 'To Be Deleted',
            'email' => 'delete@example.com',
        ]);
    }
}
