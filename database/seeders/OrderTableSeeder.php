<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            $order = new Order();
            $order->user_id = 1;
            $order->number = $faker->unique()->randomNumber();
            $order->payment_method = 'cash';
            $order->status =1;// $faker->randomElement(['pending', 'processing', 'delivering', 'completed', 'cancelled', 'refunded']);
            $order->payment_status = 1;
            $order->shipping = $faker->randomFloat(2, 0, 100);
            $order->tax = $faker->randomFloat(2, 0, 50);
            $order->discount = $faker->randomFloat(2, 0, 20);
            $order->total = $faker->randomFloat(2, 10, 500);
            $order->created_at = Carbon::now()->subMonths(rand(0, 5))->startOfMonth()->addDays(rand(0, 30))->setTime(0, 0, 0);
            $order->updated_at = Carbon::now();
            $order->save();
        }
    
    }
}
