<?php

namespace Database\Seeders;

use App\Repositories\ProductRepository;
use App\Repositories\StoreRepository;
use App\Repositories\UserRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class DumpData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        //
        // init repository
        $userRepo = app(UserRepository::class);
        $productRepo = app(ProductRepository::class);
        $storeRepo = app(StoreRepository::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('stores')->truncate();
        DB::table('products')->truncate();
        DB::beginTransaction();
       
        try {
             // create 5 user
            for ($i=0; $i < 5; $i++) { 
                dump('Create user: '.$i);
                $userInput = [
                    'name' => $faker->name,
                    'email' => $faker->unique()->safeEmail,
                    'password' => "123123",
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                $user = $userRepo->create($userInput);
                //create accesstoken
                $user->createToken(config("app.name"))->accessToken;
                
                // each user has 3 store
                for ($j=0; $j < 3; $j++) { 
                    $storeInput = [
                        'store_name' => $faker->company,
                        'user_id' => $user->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    $store = $storeRepo->create($storeInput);

                    //each store has 20 product
                    for ($k=0; $k < 20; $k++) {  
                        $productInput = [
                            'name' => $faker->name,
                            'detail' =>  $faker->paragraph,
                            'store_id' => $store->id,
                            'price' => $faker->randomFloat(2, 10, 100),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        $productRepo->create($productInput);
                    }
                }
                dump('Done: '.$i);
            }
            DB::commit();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dump($th->getMessage());
        }
       
     
    }
}
