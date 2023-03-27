<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Car;
use App\Models\Customer;
use App\Models\Worker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HTTPTest extends TestCase
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

    /** @test */
    public function it_can_edit_a_car()
    {
        $car = Car::factory()->create([
            'brand' => 'Proshe',
            'model' => '911',
            'year' => '1999',
        ]);
        $response = $this->post("/cars/update", [
            'car_id' => $car->id,
            'brand' => 'Mazda',
            'model' => 'Rx-7',
            'year' => '1999',
        ]);

        $response->assertRedirect('/cars');
        $this->assertDatabaseHas('cars', [
            'id' => $car->id,
            'brand' => 'Mazda',
            'model' => 'Rx-7',
            'year' => '1999',
        ]);
    }

    /** @test */
    public function it_can_delete_a_car()
    {
        $car = Car::factory()->create([
            'brand' => 'Proshe',
            'model' => '911',
            'year' => '1999',
        ]);

        $response = $this->delete("/cars/delete", ['car_id' => $car->id]);

        $response->assertRedirect('/cars');
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

    /**
     * WORKERS TESTS
     */
    /** @test */
    public function it_can_create_a_worker()
    {

        $customer = Customer::factory()->create(['name' => 'Pracodawca']);

        $response = $this->post('/worker/create', [
            'name' => 'John Kowalsky',
            'customer_id' => $customer->id
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('workers', ['name' => 'John Kowalsky', 'customer_id' => $customer->id]);
    }

    /** @test */
    public function it_can_display_a_list_of_worker()
    {

        $customer = Customer::factory()->create(['name' => 'Pracodawca']);

        Worker::factory()->create(['name' => 'John Kowalsky', 'customer_id' => $customer->id]);
        Worker::factory()->create(['name' => 'Jane Doe', 'customer_id' => $customer->id]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('John Kowalsky');
        $response->assertSee('Jane Doe');
    }

    /** @test */
    public function it_can_edit_a_worker()
    {
        $customer1 = Customer::factory()->create(['name' => 'Pracodawca']);
        $customer2 = Customer::factory()->create(['name' => 'NowyPracodawca']);

        $worker = Worker::factory()->create(['name' => 'John Kowalsky', 'customer_id' => $customer1->id]);
        $response = $this->post("/worker/update", [
            'worker_id' => $worker->id,
            'name' => 'Jane Doe',
            'customer_id' => $customer2->id
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('workers', ['id' => $worker->id, 'name' => 'Jane Doe', 'customer_id' => $customer2->id]);
    }

    /** @test */
    public function it_can_delete_a_worker()
    {
        $customer = Customer::factory()->create(['name' => 'Pracodawca']);

        $worker = Worker::factory()->create(['name' => 'John Kowalsky', 'customer_id' => $customer->id]);

        $response = $this->delete("/worker/delete", ['worker_id' => $worker->id]);

        $response->assertRedirect('/');
    }
}
