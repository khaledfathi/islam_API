<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\User::create([
        // 'name'=>'islam', 
        // 'email'=>'islam@mail.com',
        // 'password'=>'01125251090',
        // 'phone'=>'01125251090',
        'name'=>'admin', 
        'email'=>'admin@admin.com',
        'password'=>'admin',
        'phone'=>'01020304050',
        'type'=>'admin'
       ]);
       \App\Models\User::factory(14)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $path = 'storage/product-image/';
        $data = [
            ['name'=>'Pet Bed','price'=>29.99,'user_id'=>null,'category'=>'food','description'=>'just item 1!','image'=>$path.'01.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet Food','price'=>39.99,'user_id'=>null,'category'=>'food','description'=>'just item 2!','image'=>$path.'02.jpg', 'approval'=>'approved'],
            ['name'=>'Pet Shampoo','price'=>12.99,'user_id'=>null,'category'=>'food','description'=>'just item 3!','image'=>$path.'03.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet Collar','price'=>7.99,'user_id'=>null,'category'=>'food','description'=>'just item 4!','image'=>$path.'04.jpg', 'approval'=>'approved'],
            ['name'=>'Pet Grooming Push','price'=>4.99,'user_id'=>null,'category'=>'food','description'=>'just item 5!','image'=>$path.'05.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet Nail Clippers','price'=>9.99,'user_id'=>null,'category'=>'food','description'=>'just item 6!','image'=>$path.'06.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet Toothbrush','price'=>3.99 ,'user_id'=>null,'category'=>'food','description'=>'just item 7!','image'=>$path.'07.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet PetDental Treats','price'=>8.99,'user_id'=>null,'category'=>'food','description'=>'just item 8!','image'=>$path.'08.jpg' , 'approval'=>'approved'],
            ['name'=>'Pet Litter Box','price'=>29.99,'user_id'=>null,'category'=>'food','description'=>'just item 9!','image'=>$path.'09.jpg' , 'approval'=>'approved'],
        ]; 
        foreach($data as $record){
            \App\Models\ProductModel::create($record); 
        }
    }
}
