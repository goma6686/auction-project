<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('items') -> delete();

        \DB::table('items')->insert([
            [
                'name' => 'anime mergaite',
                'description' => 'descr',
                'condition' => 'new',
                'min_bid' => '10',
                'bid_sum' => '100',
                'cover' => 'https://otakukart.com/wp-content/uploads/2021/12/zero-two.jpg'
            ],
            [
                'name' => 'anime mergaite2',
                'description' => 'descr',
                'condition' => 'used',
                'min_bid' => '120',
                'bid_sum' => '200',
                'cover' => 'https://static.boredpanda.com/blog/wp-content/uploads/2019/03/image-5c90517716638__700.jpg'
            ],
        ]);
    }
}
