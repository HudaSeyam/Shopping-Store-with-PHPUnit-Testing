<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class CartControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    
    public function test_add_new_product_to_cart()
    {
        $this->withoutMiddleware();

        $product = Product::factory()->create();
        $this->assertNotEmpty($product);
        
        // Make a POST request to the route that handles adding to the cart
        $response = $this->get('/add-to-cart/'.$product->id); 
        
        // Assert the product was added to the session
        $response ->assertSessionHas('cartItems');
        $cartItems = session('cartItems');

        $this->assertCount(1, $cartItems);
        $this->assertArrayHasKey(1, $cartItems);
        $this->assertEquals(1, $cartItems[1]['quantity']);
    }
    public function test_increment_product_quantity_in_cart()
    {

        $this->withoutMiddleware();

        $product = Product::factory()->create();
        $this->assertNotEmpty($product);

        session()->put('cartItems', [
            $product->id => [
                'quantity' => 1,
                'image_path' => $product->image_path,
                'name' => $product->name,
                'brand' => $product->brand,
                'details' => $product->details,
                'price' => $product->price,
                'description' => $product->description,
                'shipping_cost' => $product->shipping_cost,
                'stock' => $product->stock,
            ]
        ]);        
        
        $response = $this->get('/add-to-cart/'.$product->id); 

        // Assert the product quantity was incremented
        $cartItems = session('cartItems');
        $this->assertEquals(2, $cartItems[1]['quantity']);
    }

    public function test_not_enough_stock()
    {
        $this->withoutMiddleware();

        $product = Product::factory()->create(['stock'=>1]);
        $this->assertNotEmpty($product);

        session()->put('cartItems', [
            $product->id => [
                'quantity' => 2,
                'image_path' => $product->image_path,
                'name' => $product->name,
                'brand' => $product->brand,
                'details' => $product->details,
                'price' => $product->price,
                'description' => $product->description,
                'shipping_cost' => $product->shipping_cost,
                'stock' => $product->stock,
            ]
        ]);        
        
        $response = $this->get('/add-to-cart/'.$product->id); 

        // Assert that the error message is returned
        $response->assertSessionHas('error', 'Not enough stock available for this product.');
    }

    public function test_delete_cart_item()
    {
        $this->withoutMiddleware();

        $product = Product::factory()->create();
        $this->assertNotEmpty($product);

        session()->put('cartItems', [
            $product->id => [
                'quantity' => 1,
                'image_path' => $product->image_path,
                'name' => $product->name,
                'brand' => $product->brand,
                'details' => $product->details,
                'price' => $product->price,
                'description' => $product->description,
                'shipping_cost' => $product->shipping_cost,
                'stock' => $product->stock,
            ]
        ]);    

        // Create a fake request with an item ID to delete
        $response = $this->get('/delete-from-cart/'. $product->id);

        // Assert that the item was removed from the session
        $response->assertSessionMissing('cartItems.1');
        $response->assertSessionHas('success', 'Product deleted successfully');
    }
}
