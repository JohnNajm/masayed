<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

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
                'longtext' => "<p><h5>Features of Laptop " .$i . "</h5><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempore nemo culpa earum, laborum error eligendi est recusandae illo atque ratione, doloremque minus, tenetur magnam maiores maxime quaerat eaque facilis!<br /><br /><strong>Editorial Reviews</strong></p>
                    <p><br /><strong>Manufacturer's Description</strong> <br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos obcaecati, pariatur aliquam ad beatae eaque nisi voluptatem ratione officiis temporibus tenetur laborum qui distinctio facilis nostrum, sint vero ipsa optio!<br /><br /><strong>Dummy Title 1</strong><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat id vitae accusamus, natus dolor magnam consequatur quia suscipit ut, incidunt reiciendis ab eligendi perferendis, maiores dolores vel inventore omnis reprehenderit!</p>
                    <p><br /><strong>Dummy Title 2</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aspernatur dolorum aliquam architecto quibusdam veniam similique odit fugit facere, vitae nostrum, soluta voluptates id dignissimos vero sit magni! Cupiditate, vitae.<br /><br /><strong>Dummy Title 3</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit magni, sequi voluptatum facilis repellat veniam aspernatur fugiat. Error provident, sequi officiis architecto sint mollitia quaerat totam. Voluptatum ratione praesentium optio.<br /><br /></p>",
                'isFeatured' => rand(0,1),
            ])->Category()->attach(1);    
            }


            for ($i=1; $i <= 30; $i++) {
                Product::create([
                    'name' => 'Camera '.$i,
                    'slug' => 'camera-'.$i,
                    'details' => [10,12,20][array_rand([10,12,20])] . ' MegaPixel, ' . [8, 16, 24][array_rand([8, 16, 24])] .' Hour battery life',
                    'price' => rand(149999, 249999),
                    'description' =>'Lorem '. $i . ' ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
                    'longtext' => "<p><h5>Features of Camera " .$i . "</h5><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam tempore nemo culpa earum, laborum error eligendi est recusandae illo atque ratione, doloremque minus, tenetur magnam maiores maxime quaerat eaque facilis!<br /><br /><strong>Editorial Reviews</strong></p>
                    <p><br /><strong>Manufacturer's Description</strong> <br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos obcaecati, pariatur aliquam ad beatae eaque nisi voluptatem ratione officiis temporibus tenetur laborum qui distinctio facilis nostrum, sint vero ipsa optio!<br /><br /><strong>Dummy Title 1</strong><br /><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat id vitae accusamus, natus dolor magnam consequatur quia suscipit ut, incidunt reiciendis ab eligendi perferendis, maiores dolores vel inventore omnis reprehenderit!</p>
                    <p><br /><strong>Dummy Title 2</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde aspernatur dolorum aliquam architecto quibusdam veniam similique odit fugit facere, vitae nostrum, soluta voluptates id dignissimos vero sit magni! Cupiditate, vitae.<br /><br /><strong>Dummy Title 3</strong><br />Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit magni, sequi voluptatum facilis repellat veniam aspernatur fugiat. Error provident, sequi officiis architecto sint mollitia quaerat totam. Voluptatum ratione praesentium optio.<br /><br /></p>",
                    'isFeatured' => rand(0,1),
                ])->Category()->attach(2);    
            
                }
    }
}
