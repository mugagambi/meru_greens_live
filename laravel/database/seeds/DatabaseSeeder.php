<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('contacts')->truncate();
        factory(App\Contact::class, 50)->create();
        DB::table('products')->delete();
        factory(App\Product::class, 100)->create();
    }
}
