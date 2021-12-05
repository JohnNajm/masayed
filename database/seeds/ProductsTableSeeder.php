<?php
use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Laptop '.$i,
                'slug' => 'laptop-'.$i,
                'details' => [13,14,15][array_rand([13,14,15])] . ' inch, ' . [1, 2, 3][array_rand([1, 2, 3])] .' TB SSD, ' . [8,16,32][array_rand([8,16,32])] .'GB RAM',
                'price' => rand(1499999, 2499999),
                'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                'isFeatured' => rand(0,1),
            ])->categories()->attach(1);    
            }


            for ($i=1; $i <= 30; $i++) {
                Product::create([
                    'name' => 'Camera '.$i,
                    'slug' => 'camera-'.$i,
                    'details' => [10,12,20][array_rand([10,12,20])] . ' MegaPixel, ' . [8, 16, 24][array_rand([8, 16, 24])] .' Hour battery life',
                    'price' => rand(149999, 249999),
                    'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                    'isFeatured' => rand(0,1),
                ])->categories()->attach(2);    
            
                }
    }
}
