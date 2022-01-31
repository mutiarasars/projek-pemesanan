<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class CategoreiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
            'name' => 'baju',
            'price' => '50.000',
            'description' => 'ini adalah description',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
