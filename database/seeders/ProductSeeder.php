<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $products = [
            [
                'name' => 'Apple Macbook Pro 16',
                'details' => 'Apple M1 Pro, 16 GPU, 16 GB, 512 GB SSD',
                'description' => 'The most powerful MacBook Pro ever is here. With the blazing-fast M1 Pro or M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.',
                'brand' => 'Apple',
                'price' => 2499,
                'shipping_cost' => 25,
                'stock' =>10,
                'image_path' => 'storage/product1.jpeg'
            ],
            [
                'name' => 'Samsung Galaxy S21',
                'details' => '6.2", 128GB, 8GB RAM',
                'description' => 'The Galaxy S21 is designed to be the smartphone that fits seamlessly into your life. Its sleek design and stunning display provide an immersive experience for every user.',
                'brand' => 'Samsung',
                'price' => 799,
                'shipping_cost' => 15,
                'stock' => 20,
                'image_path' => 'storage/product2.jpeg',
            ],
            [
                'name' => 'Sony WH-1000XM4',
                'details' => 'Wireless Noise-Canceling Overhead Headphones',
                'description' => 'The Sony WH-1000XM4 headphones are known for their superb noise cancellation, premium sound quality, and long battery life, making them perfect for travel or working from home.',
                'brand' => 'Sony',
                'price' => 349,
                'shipping_cost' => 10,
                'stock' => 15,
                'image_path' => 'storage/product3.jpeg',
            ],
            [
                'name' => 'Dell XPS 13',
                'details' => '13.3" FHD, Intel Core i7, 16GB RAM, 512GB SSD',
                'description' => 'The Dell XPS 13 is a sleek and powerful ultrabook that is perfect for both work and play. With its stunning display and lightweight design, it is perfect for on-the-go professionals.',
                'brand' => 'Dell',
                'price' => 1399,
                'shipping_cost' => 20,
                'stock' => 5,
                'image_path' => 'storage/product4.jpeg',
            ],
        ];

        foreach($products as $key => $value) {
            Product::create($value);
        }
        //Product::factory()->count(1)->create();
    }
}
