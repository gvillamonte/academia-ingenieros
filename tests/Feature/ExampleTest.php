<?php

namespace Tests\Feature;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_all_main_web_routes_return_successful_response(): void
    {
        $routes = [
            '/',
            '/courses',
            '/courses-list',
            '/course',
            '/course/wordpress-theme-development-with-bootstrap',
            '/lessons',
            '/lessons/wordpress-theme-development-with-bootstrap',
            '/login',
            '/register',
            '/shopping-cart',
            '/my-account',
            '/my-courses',
            '/about-us',
            '/privacy-policy',
            '/terms-and-condition',
            '/buscar-ingeniero',
            '/cms',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }

    public function test_api_ingeniero_search_works_for_all_business_cases_from_database(): void
    {
        $this->getJson('/api')
            ->assertStatus(200)
            ->assertJsonPath('status', 'ok')
            ->assertJsonPath('total_ingenieros', 4);

        $this->getJson('/api/ingenieros/buscar?cip=12345678')
            ->assertStatus(200)
            ->assertJsonPath('status', 'enabled')
            ->assertJsonPath('tipo', 'verde');

        $this->getJson('/api/ingenieros/buscar?cip=87654321')
            ->assertStatus(200)
            ->assertJsonPath('status', 'disabled')
            ->assertJsonPath('tipo', 'rojo');

        $this->getJson('/api/ingenieros/buscar?cip=99999999')
            ->assertStatus(404)
            ->assertJsonPath('status', 'not_found');

        $this->getJson('/api/ingenieros/buscar?cip=123')
            ->assertStatus(422)
            ->assertJsonPath('status', 'invalid_format');
    }

    public function test_authentication_register_login_profile_and_logout_flow(): void
    {
        // Registro de nuevo estudiante
        $response = $this->post('/register', [
            'first_name' => 'Carlos',
            'last_name' => 'Valdivia',
            'email' => 'carlos.valdivia@example.com',
            'password' => 'secret123',
        ]);
        $response->assertRedirect(route('my.courses'));
        $this->assertAuthenticated();

        // Actualizar perfil
        $this->post('/my-account', [
            'first_name' => 'Carlos Alberto',
            'last_name' => 'Valdivia',
            'email' => 'carlos.valdivia@example.com',
            'password' => '********',
        ])->assertRedirect();

        $this->assertDatabaseHas('users', [
            'email' => 'carlos.valdivia@example.com',
            'first_name' => 'Carlos Alberto',
        ]);

        // Cerrar sesión
        $this->post('/logout')->assertRedirect(route('home'));
        $this->assertGuest();

        // Login con usuario existente del Seeder
        $this->post('/login', [
            'email' => 'signe.thompson@example.com',
            'password' => 'password123',
        ])->assertRedirect(route('my.courses'));
        $this->assertAuthenticated();
    }
}
