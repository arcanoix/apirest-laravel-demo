<?php

namespace Database\Seeders;

use App\Models\Adress;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Facade\Ignition\Middleware\AddLogs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Order::truncate();

        $products =  Product::create([
                            'name'   => 'Mouse',
                            'detail' => 'disposito hardware',
                            'price'  => 20.33
                        ]);

        $users = User::find(1);   

        $address = Adress::where('user_id', $users->id)->first();

        $order = Order::create([
                    'user_id' => $users->id,
                    'address_id' => $address->id,
                    'total' => 1500.00
                ]);
         
        $order->products()->attach($products->id, ['unit_price' => 15, 'quantity' => 1]);     
        
        Schema::enableForeignKeyConstraints();
    }
}
