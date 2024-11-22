<?php

namespace Tests\Feature;

use App\Models\Animal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Faker\Factory as Faker;

class AnimalCrudTest extends TestCase
{
    use RefreshDatabase;

    protected $animalData;

    public function setUp(): void
    {
        parent::setUp();
        $faker = Faker::create();

        $this->animalData = [
            'name' => $faker->word(),
            'age' => $faker->randomNumber(3),
            'type' => $faker->randomElement(
                    [             
                        'chien',
                        'cheval',
                        'brebis',
                        'cochon'
                    ]),
            'race' => $faker->randomElement(
                    [ 
                        'labrador',
                        'frison',
                        'pottok',
                        'irish cob',
                        'merinos',
                        'solognotes'
                    ]),
            'description' => $faker->text(),
            'isSaled' =>  $faker->randomElement([0,1]),
            'prixHt' => $faker->randomNumber(3),
            'image1' => null,
            'image2' => null
        ];
    }

    public function test_can_create_an_animal()
    {

        $response = $this->postJson('api/animals', $this->animalData);
        $response->assertStatus(201);

        $this->assertDatabaseCount('animals', 1);
    }

    public function test_can_read_an_animal()
    {
        $animal = Animal::factory()->create();
        $response = $this->getJson("api/animals/{$animal->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $animal->id,
            'name' => $animal->name,
            'race' => $animal->race,
            'race' => $animal->race,
            'isSaled' => $animal->isSaled,
            'prixHt' => $animal->prixHt,
        ]);
    }

    public function test_can_update_an_animal()
    {
        $animal = Animal::factory()->create();

        $response = $this->putJson("api/animals/{$animal->id}", $this->animalData);
        $response->assertStatus(200);

        $this->assertDatabaseHas('animals', $this->animalData);
    }

    public function test_can_delete_an_animal()
    {
        $animal = Animal::factory()->create();

        $response = $this->deleteJson("api/animals/{$animal->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('animals', ['id' => $animal->id]);
    }
}
