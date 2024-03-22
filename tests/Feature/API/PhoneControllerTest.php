<?php

namespace Tests\Feature;

use App\Models\Contact;
use Tests\TestCase;

use App\Models\Phone;
use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PhoneControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_phone_put_endpoint()
    {
        $phone = Phone::factory()
            ->for(Contact::factory()->create())
            ->create();

        $response = $this->putJson("/api/phones/{$phone->id}", [
            'phone' => '23625325',
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'phone' => '23625325',
            ]);
    }

    public function test_phone_delete_endpoint()
    {
        $phone = Phone::factory()
            ->for(Contact::factory()->create())
            ->create();

        $response = $this->deleteJson("/api/phones/{$phone->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('phones', ['id' => $phone->id]);
    }
}
