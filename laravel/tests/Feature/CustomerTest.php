<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Customer;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * CARS TESTS
     */
    /** @test */
    public function it_can_create_a_car()
    {

        $response = $this->post('/cars/create', [
            'brand' => 'Proshe',
            'model' => '911',
            'year' => '1999',
        ]);

        $response->assertRedirect('/cars');
        $this->assertDatabaseHas('cars', [
            'brand' => 'Proshe',
            'model' => '911',
            'year' => '1999',
        ]);
    }

    /** @test */
    public function it_can_display_a_list_of_cars()
    {
        Car::factory()->create([
            'brand' => 'Proshe',
            'model' => '911',
            'year' => '1999',
        ]);
        Car::factory()->create([
            'brand' => 'Skoda',
            'model' => 'Octavia',
            'year' => '2016',
        ]);

        $response = $this->get('/cars');

        $response->assertOk();
        $response->assertSee('Proshe');
        $response->assertSee('Skoda');
    }
    /**
     * CUSTOMER TESTS
     */
    /** @test */
    public function it_can_create_a_customer()
    {

        $response = $this->post('/customer/create', [
            'name' => 'John Doe',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('customers', ['name' => 'John Doe']);
    }

    /** @test */
    public function it_can_display_a_list_of_customers()
    {
        Customer::factory()->create(['name' => 'John Doe']);
        Customer::factory()->create(['name' => 'Jane Doe']);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('John Doe');
        $response->assertSee('Jane Doe');
    }

    /** @test */
    public function it_can_edit_a_customer()
    {
        $customer = Customer::factory()->create(['name' => 'John Doe']);
        $response = $this->post("/customer/update", [
            'customer_id' => $customer->id,
            'name' => 'Jane Doe',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('customers', ['id' => $customer->id, 'name' => 'Jane Doe']);
    }

    /** @test */
    public function it_can_delete_a_customer()
    {
        $customer = Customer::factory()->create(['name' => 'John Doe']);

        $response = $this->delete("/customer/delete", ['customer_id' => $customer->id]);

        $response->assertRedirect('/');
    }

}
