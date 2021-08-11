<?php

namespace Database\Seeders;

use App\Models\ProductUser;
use Illuminate\Database\Seeder;

class ProductUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ProductUser::factory(10)->create();
    }
}
