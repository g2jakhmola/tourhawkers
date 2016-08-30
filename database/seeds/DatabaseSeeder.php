<?php

use Illuminate\Database\Seeder;
use App\PermissionTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionTableSeeder::class);
    }
}
