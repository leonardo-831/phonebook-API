<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;
use App\Models\Contact;
use Illuminate\Testing\Fluent\AssertableJson;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_get_endpoint(): void
    {
        $contacts = Contact::factory(5)->create();

        $response = $this->getJson('/api/contacts');

        $response->assertStatus(200);

        $response->assertJson(function (AssertableJson $json) use ($contacts) {
            $json->whereAllType([
                '0.id' => 'integer',
                '0.name' => 'string',
                '0.email' => 'string',
                '0.cpf' => 'string',
                '0.birthDate' => 'string',
            ]);

            $json->hasAll([
                '0.id',
                '0.name',
                '0.email',
                '0.cpf',
                '0.birthDate'
            ]);

            $contact = $contacts->first();

            $json->whereAll([
                '0.id' => $contact->id,
                '0.name' => $contact->name,
                '0.email' => $contact->email,
                '0.cpf' => $contact->cpf,
                '0.birthDate' => $contact->birthDate,
            ]);
        });
    }

    public function test_contact_post_endpoint(): void
    {

        $response = $this->postJson('/api/contacts', [
            'name' => 'leonardo',
            'email' => 'leonardo@gmail.com',
            'cpf' => '12356897506',
            'birthDate' => '2004-04-15',
            'phones' => [
                ['phone' => '12345678'],
                ['phone' => '24566787']
            ]
        ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'name',
                'email',
                'cpf',
                'birthDate',
            ])
            ->assertJsonFragment([
                'name' => 'leonardo',
                'email' => 'leonardo@gmail.com',
                'cpf' => '12356897506',
                'birthDate' => '2004-04-15',
            ]);
    }

    public function test_contact_put_endpoint()
    {
        $contact = Contact::factory()->create();

        $response = $this->putJson("/api/contacts/{$contact->id}", [
            'name' => 'leonardo2',
            'email' => 'leonardo2@gmail.com',
            'cpf' => '44532698502',
            'birthDate' => '2009-04-15',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'name',
                'email',
                'cpf',
                'birthDate',
            ])
            ->assertJsonFragment([
                'name' => 'leonardo2',
                'email' => 'leonardo2@gmail.com',
                'cpf' => '44532698502',
                'birthDate' => '2009-04-15',
            ]);
    }

    public function test_contact_delete_endpoint()
    {
        $contact = Contact::factory()->create();

        $response = $this->deleteJson("/api/contacts/{$contact->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('contacts', ['id' => $contact->id]);
    }
}
